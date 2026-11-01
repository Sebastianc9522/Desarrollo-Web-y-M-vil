import stomp
import argparse
import json
from decimal import Decimal, InvalidOperation
import xml.etree.ElementTree as ET

DESTINO = "/queue/pedidos_cerveceria"

def construir_mensaje(formato: str, pedido: dict, texto: str) -> tuple[str, str]:
    if formato == "texto":
        return texto, "text/plain; charset=utf-8"
    if formato == "fijo":
        identificador = str(pedido["id"])
        cliente = str(pedido["cliente"])
        monto = Decimal(pedido["monto"])
        monto_campo = f"{monto:010.2f}"
        if not (identificador.isascii() and identificador.isdigit() and len(identificador) <= 6):
            raise ValueError("En formato fijo, --id debe tener hasta 6 digitos ASCII")
        if len(cliente) > 20 or any(ord(c) > 127 for c in cliente):
            raise ValueError("En formato fijo, --cliente admite hasta 20 caracteres ASCII")
        if monto < 0 or len(monto_campo) != 10:
            raise ValueError("En formato fijo, --monto debe estar entre 0 y 99999999.99")
        return f"{identificador.zfill(6)}{cliente:<20}{monto_campo}", "text/plain; charset=utf-8"
    if formato == "json":
        return json.dumps(pedido, ensure_ascii=False), "application/json; charset=utf-8"
    if formato == "xml":
        raiz = ET.Element("pedido_cerveceria")
        for clave, valor in pedido.items():
            if isinstance(valor, list):
                items = ET.SubElement(raiz, clave)
                for item in valor:
                    item_elem = ET.SubElement(items, "item")
                    for k, v in item.items():
                        ET.SubElement(item_elem, k).text = str(v)
            else:
                ET.SubElement(raiz, clave).text = str(valor)
        return ET.tostring(raiz, encoding="unicode"), "application/xml; charset=utf-8"
    raise ValueError(f"Formato desconocido: {formato}")

def main():
    parser = argparse.ArgumentParser(description="Productor STOMP - Cervecería Craft & Beer")
    parser.add_argument("--formato", choices=["texto", "fijo", "xml", "json"], required=True)
    parser.add_argument("--mensaje", default="Nuevo pedido registrado en Craft & Beer")
    parser.add_argument("--id", default="1001", help="ID del pedido")
    parser.add_argument("--cliente", default="Juan Perez", help="Nombre del cliente")
    parser.add_argument("--monto", default="25500.00", help="Monto total del pedido")
    
    # Nuevos argumentos específicos de la cervecería
    parser.add_argument("--tipo_cerveza", default="IPA", help="Tipo de cerveza principal")
    parser.add_argument("--cantidad", type=int, default=6, help="Cantidad de botellas/latas")

    parser.add_argument("--host", default="127.0.0.1")
    parser.add_argument("--port", default=61613)
    parser.add_argument("--usuario", default="demo")
    parser.add_argument("--clave", default="demo123")
    args = parser.parse_args()

    try:
        monto = Decimal(args.monto)
        if not monto.is_finite():
            raise ValueError("El monto debe ser un número finito")
    except InvalidOperation as exc:
        parser.error(f"Monto no válido: {args.monto}")
    
    # Estructura del pedido adaptada a la cervecería
    pedido = {
        "id": args.id, 
        "cliente": args.cliente, 
        "monto": str(monto),
        "detalles": [
            {
                "producto": args.tipo_cerveza,
                "cantidad": args.cantidad
            }
        ]
    }
    
    try:
        cuerpo, mime = construir_mensaje(args.formato, pedido, args.mensaje)
    except ValueError as excc:
        parser.error(str(excc))

    # Enviar mensaje al broker
    conexion = stomp.Connection12([(args.host, args.port)], vhost="/")
    try:
        conexion.connect(args.usuario, args.clave, wait=True)
        conexion.send(
            destination=DESTINO,
            body=cuerpo,
            headers={
                "content-type": mime,
                "x-formato": args.formato,
                "persistent": "true",
            },
        )
        print(f"Pedido enviado a {DESTINO} (formato={args.formato}):\n{cuerpo}")
    finally:
        if conexion.is_connected():
            conexion.disconnect()

if __name__ == "__main__":
    main()
