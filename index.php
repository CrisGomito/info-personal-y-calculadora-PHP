<?php
// Página personal con Calculadora Interactiva Móvil (JavaScript + PHP)
$asignatura = "Aplicaciones Web";
$semestre = "6to Semestre - Ingeniería de Software";
$estudiante = "Cristian Bladimir Pilco Poaquiza";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV y Calculadora Móvil - Cristian Pilco</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        <h1><?php echo htmlspecialchars($estudiante); ?></h1>
        <p><strong>Ocupación:</strong> Estudiante</p>
        <p><strong>Ubicación:</strong> San Miguel de Bolívar, Ecuador</p>
        
        <h2>Perfil Profesional</h2>
        <p>Estudiante de 6to semestre de Ingeniería de Software con sólidos conocimientos en el desarrollo de software para proyectos personales, aplicativos móviles, web y de escritorio, administración de servidores, desarrollo de videojuegos y creación de contenidos audiovisuales.</p>
        
        <h2>Estudios</h2>
        <ul>
            <li>Bachillerato en Electromecánica Automotriz</li>
            <li>Cursando 6to Semestre Ingeniería de Software</li>
        </ul>
        
        <h2>Experiencia Profesional</h2>
        <ul>
            <li>Desarrollo de software para proyectos personales</li>
            <li>Desarrollo de aplicativos móviles, web y de escritorio</li>
            <li>Administrador de servidores</li>
            <li>Desarrollo de videojuegos</li>
            <li>Creador de videos</li>
        </ul>
        
        <h2>Conocimientos Técnicos</h2>
        <ul>
            <li>Html, CSS, Js, Kotlin, Dart, Flutter</li>
            <li>C#, PHP, Java, Typescript, Python</li>
            <li>PostgreSQL, SQL Server, MySQL, MariaDB</li>
            <li>DevOps, Project Manager (PM)</li>
        </ul>
        
        <h2>Contacto</h2>
        <ul>
            <li><strong>Teléfono:</strong> +593 962693974</li>
            <li><strong>Celular:</strong> 0962693974</li>
            <li><strong>Correo:</strong> cristianpilco05@gmail.com</li>
        </ul>
    </div>

    <!-- Calculadora Estilo App Móvil (Fluida sin recargas) -->
    <div class="contenedor-calc">
        <h2>Calculadora Móvil Interactiva</h2>
        <div class="calculator">
            <input type="text" id="calc-screen" class="calc-screen" value="0" readonly>
            
            <div class="calc-keypad">
                <button type="button" class="btn-action btn-clear" onclick="clearScreen()">C</button>
                <button type="button" class="btn-action" onclick="appendValue('(')">(</button>
                <button type="button" class="btn-action" onclick="appendValue(')')">)</button>
                <button type="button" class="btn-op" onclick="appendValue('/')">÷</button>

                <button type="button" onclick="appendValue('7')">7</button>
                <button type="button" onclick="appendValue('8')">8</button>
                <button type="button" onclick="appendValue('9')">9</button>
                <button type="button" class="btn-op" onclick="appendValue('*')">×</button>

                <button type="button" onclick="appendValue('4')">4</button>
                <button type="button" onclick="appendValue('5')">5</button>
                <button type="button" onclick="appendValue('6')">6</button>
                <button type="button" class="btn-op" onclick="appendValue('-')">-</button>

                <button type="button" onclick="appendValue('1')">1</button>
                <button type="button" onclick="appendValue('2')">2</button>
                <button type="button" onclick="appendValue('3')">3</button>
                <button type="button" class="btn-op" onclick="appendValue('+')">+</button>

                <button type="button" onclick="appendValue('0')">0</button>
                <button type="button" onclick="appendValue('.')">.</button>
                <button type="button" class="btn-action" onclick="deleteChar()">⌫</button>
                <button type="button" class="btn-eq" onclick="calculate()">=</button>
            </div>
        </div>
    </div>

    <script>
        const screen = document.getElementById('calc-screen');
        let currentInput = '0';

        function updateScreen() {
            screen.value = currentInput;
        }

        function appendValue(val) {
            if (currentInput === '0' || currentInput === 'Error') {
                currentInput = val;
            } else {
                currentInput += val;
            }
            updateScreen();
        }

        function clearScreen() {
            currentInput = '0';
            updateScreen();
        }

        function deleteChar() {
            if (currentInput.length > 1 && currentInput !== 'Error') {
                currentInput = currentInput.slice(0, -1);
            } else {
                currentInput = '0';
            }
            updateScreen();
        }

        function calculate() {
            try {
                let expr = currentInput.replace(/×/g, '*').replace(/÷/g, '/');
                let result = eval(expr);
                if (!isFinite(result)) {
                    currentInput = 'Error';
                } else {
                    currentInput = String(result);
                }
            } catch (e) {
                currentInput = 'Error';
            }
            updateScreen();
        }
    </script>
</body>
</html>