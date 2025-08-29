# Especificaciones de Logos - LS Tech Partners

## Logos Requeridos

### 1. Logo Blanco (Header)
- **Archivo:** `images/logo-blanco.png`
- **Uso:** Header de navegación (fondo azul/oscuro)
- **Dimensiones:** 200px x 50px (aprox)
- **Formato:** PNG con transparencia
- **Color:** Blanco (#FFFFFF)
- **Descripción:** Logo horizontal legible sobre fondos oscuros

### 2. Logo Oscuro (Footer)
- **Archivo:** `images/logo-oscuro.png`
- **Uso:** Footer y secciones con fondo claro
- **Dimensiones:** 250px x 60px (aprox)
- **Formato:** PNG con transparencia
- **Color:** Azul oscuro (#1e293b) o negro
- **Descripción:** Logo horizontal legible sobre fondos claros

### 3. Logo Principal
- **Archivo:** `images/logo.png`
- **Uso:** Compatibilidad con archivo legacy
- **Dimensiones:** 300px x 80px (aprox)
- **Formato:** PNG con transparencia
- **Descripción:** Puede ser igual al logo oscuro

### 4. Icono/Favicon
- **Archivo:** `images/icono.png`
- **Uso:** Icono cuadrado, favicon
- **Dimensiones:** 64px x 64px (mínimo)
- **Formato:** PNG con transparencia
- **Descripción:** Solo el símbolo/icono sin texto

### 5. Favicon
- **Archivo:** `images/favicon.ico`
- **Uso:** Icono del navegador (pestaña)
- **Dimensiones:** 32x32, 16x16 (multi-resolución)
- **Formato:** ICO
- **Descripción:** Icono pequeño para la pestaña del navegador

## Consideraciones de Diseño

### Colores de Marca
- **Primario:** #2563eb (Azul moderno)
- **Secundario:** #1e293b (Azul oscuro)
- **Acento:** #0ea5e9 (Azul claro)

### Tipografía Sugerida
- **Principal:** Poppins (Bold/SemiBold)
- **Alternativa:** Inter, Roboto

### Elementos Visuales
- Formas geométricas modernas
- Líneas limpias y minimalistas
- Posible integración de elementos tecnológicos (circuitos, redes)

## Ubicaciones en el Código

1. **Header Navigation (todas las páginas):**
   ```html
   <img src="images/logo-blanco.png" alt="Logo LS Tech Partners" style="height: 40px;">
   ```

2. **Footer (todas las páginas):**
   ```html
   <img src="images/logo-oscuro.png" alt="Logo LS Tech Partners" style="width: 150px;">
   ```

3. **HTML Head (todas las páginas):**
   ```html
   <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
   ```

## Herramientas Recomendadas

### Para Crear Logos:
- **Adobe Illustrator** (profesional)
- **Canva** (fácil de usar)
- **Figma** (gratuito, profesional)
- **GIMP** (gratuito)

### Para Convertir Formatos:
- **Online:** convertio.co, cloudconvert.com
- **Software:** Adobe Photoshop, GIMP

## Proceso de Implementación

1. **Crear/Diseñar** los logos según especificaciones
2. **Guardar** en los formatos correctos
3. **Subir** a la carpeta `images/`
4. **Verificar** que se visualicen correctamente
5. **Optimizar** tamaño de archivos si es necesario
