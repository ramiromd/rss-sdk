# PHP RSS Standard Development Kit (SDK)

## Estructura de clases

### Data Sources

Las clases encargadas de, la abstracción de las fuentes de datos, se encuentra bajo el namespace `Ramiromd\RssSdk\Sources`. Existen 2 (dos) tipos de abstracciones:

1. `LocalFile`: Abstrae el acceso a un archivo local. Enfocada para ambientes de testing.
2. `Http`: Abstrae el acceso a un archivo, externo, mediante HTTP. Enfocada para ambientes productivos.