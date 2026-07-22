<?php
/**
 * dashboard_vet.php
 * Dashboard Administrativo Veterinario
 * Estructura de menús generada dinámicamente en PHP básico.
 */

$clinica = "Clínica Veterinaria HuellaSana";
$admin   = "Dra. Renata Solís";
$rol     = "Administradora General";

// Estructura de menús y submenús (PHP básico: arreglo asociativo + foreach)
$menus = [
    "Mascotas" => [
        "submenus" => ["Lista de Mascotas", "Registro de Pacientes", "Actualizar Datos de Mascota"]
    ],
    "Cirugías" => [
        "submenus" => ["Calendario de Cirugías", "Programar Cirugía", "Seguimiento Postoperatorio"]
    ],
    "Vacunación" => [
        "submenus" => ["Historial de Vacunación", "Registrar Nueva Vacuna", "Próximas Vacunas"]
    ],
    "Farmacia" => [
        "submenus" => ["Inventario de Farmacia", "Entrada de Medicamentos", "Medicamentos por Vencer"]
    ],
    "Facturación" => [
        "submenus" => ["Nueva Factura", "Historial de Facturas", "Pagos Pendientes"]
    ],
    "Configuración" => [
        "submenus" => ["Datos de la Clínica", "Usuarios del Sistema", "Cerrar Sesión"]
    ],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo htmlspecialchars($clinica); ?> · Panel Administrativo</title>

<!-- W3.CSS -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- Tipografías -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<!-- Estilos propios -->
<link rel="stylesheet" href="dashboard_vet.css">
</head>
<body>

<!-- ===================== BARRA LATERAL ===================== -->
<nav class="w3-sidebar w3-bar-block vet-sidebar" id="vetSidebar">

    <!-- Identidad visual -->
    <div class="w3-card vet-identity">
        <div class="vet-logo">
            <span class="vet-logo-mark">HS</span>
        </div>
        <div class="vet-clinic-name"><?php echo htmlspecialchars($clinica); ?></div>
        <div class="vet-admin-box">
            <div class="vet-admin-avatar"><?php echo strtoupper(substr($admin, 0, 1)); ?></div>
            <div>
                <div class="vet-admin-name"><?php echo htmlspecialchars($admin); ?></div>
                <div class="vet-admin-role"><?php echo htmlspecialchars($rol); ?></div>
            </div>
        </div>
    </div>

    <!-- Menús y submenús generados con PHP -->
    <div class="vet-menu-scroll">
    <?php foreach ($menus as $nombreMenu => $data): ?>
        <?php $slug = strtolower(str_replace(["á","é","í","ó","ú","ñ"," "], ["a","e","i","o","u","n","-"], $nombreMenu)); ?>
        <div class="vet-menu-group">
            <button class="w3-bar-item w3-button w3-hover-blue vet-menu-toggle" onclick="toggleSubmenu('sub-<?php echo $slug; ?>', this)">
                <span class="vet-menu-label"><?php echo htmlspecialchars($nombreMenu); ?></span>
                <span class="vet-menu-arrow">▾</span>
            </button>
            <div class="w3-bar-block vet-submenu" id="sub-<?php echo $slug; ?>">
                <?php foreach ($data["submenus"] as $sub): ?>
                    <a href="#" class="w3-bar-item w3-button w3-hover-blue vet-submenu-item"><?php echo htmlspecialchars($sub); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</nav>

<!-- Botón de menú para móvil -->
<button class="w3-button w3-teal w3-hide-large vet-toggle-btn" onclick="toggleSidebar()">Menú</button>

<!-- ===================== CONTENIDO PRINCIPAL ===================== -->
<div class="vet-main" id="vetMain">

    <header class="vet-header">
        <div>
            <h1>Panel de Control</h1>
            <p class="vet-subtitle">Bienvenida, <?php echo htmlspecialchars(explode(" ", $admin)[1] ?? $admin); ?>. Aquí tienes el resumen de hoy.</p>
        </div>
        <div class="vet-header-tag">
            <span class="vet-dot"></span> Sistema en línea
        </div>
    </header>

    <!-- ============ FORMULARIO: REGISTRO DE PACIENTES ============ -->
    <section class="w3-card vet-form-card" id="registro-pacientes">
        <div class="vet-form-title">
            <span class="vet-form-title-icon">RP</span>
            <div>
                <h2>Registro de Pacientes</h2>
                <p>Ingresa los datos iniciales de la mascota atendida en clínica.</p>
            </div>
        </div>

        <form id="formRegistroPacientes" autocomplete="off">
            <div class="w3-row-padding">
                <div class="w3-col m6">
                    <label class="vet-label" for="nombreMascota">Nombre de la mascota</label>
                    <input class="w3-input w3-border vet-input" type="text" id="nombreMascota" name="nombreMascota" placeholder="Ej. Firulais" required>
                </div>
                <div class="w3-col m6">
                    <label class="vet-label" for="especie">Especie</label>
                    <select class="w3-select w3-border vet-input" id="especie" name="especie" required>
                        <option value="" disabled selected>Selecciona una especie</option>
                        <option value="Canino">Canino</option>
                        <option value="Felino">Felino</option>
                        <option value="Ave">Ave</option>
                        <option value="Roedor">Roedor</option>
                        <option value="Reptil">Reptil</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            </div>

            <div class="w3-row-padding">
                <div class="w3-col m6">
                    <label class="vet-label" for="raza">Raza</label>
                    <input class="w3-input w3-border vet-input" type="text" id="raza" name="raza" placeholder="Ej. Labrador">
                </div>
                <div class="w3-col m3">
                    <label class="vet-label" for="peso">Peso (kg)</label>
                    <input class="w3-input w3-border vet-input" type="number" step="0.1" min="0" id="peso" name="peso" placeholder="Ej. 12.5">
                </div>
                <div class="w3-col m3">
                    <label class="vet-label" for="dniPropietario">DNI del propietario</label>
                    <input class="w3-input w3-border vet-input" type="text" id="dniPropietario" name="dniPropietario" placeholder="0000-0000">
                </div>
            </div>

            <div class="w3-row-padding">
                <div class="w3-col m12">
                    <label class="vet-label" for="observaciones">Alergias / Observaciones</label>
                    <textarea class="w3-textarea w3-border vet-input" id="observaciones" name="observaciones" rows="4" placeholder="Detalle alergias, condiciones previas u observaciones relevantes..."></textarea>
                </div>
            </div>

            <div class="vet-form-actions">
                <button type="submit" class="w3-button vet-btn-save">Guardar Registro</button>
                <button type="reset" class="w3-button w3-border vet-btn-clear">Limpiar</button>
            </div>

            <p class="vet-form-msg" id="formMsg"></p>
        </form>
    </section>

    <!-- ============ TARJETAS RESUMEN ============ -->
    <div class="w3-row-padding vet-stats-row">
        <div class="w3-col m3 s6">
            <div class="w3-card vet-stat-card">
                <div class="vet-stat-value">128</div>
                <div class="vet-stat-label">Mascotas activas</div>
            </div>
        </div>
        <div class="w3-col m3 s6">
            <div class="w3-card vet-stat-card">
                <div class="vet-stat-value">5</div>
                <div class="vet-stat-label">Cirugías esta semana</div>
            </div>
        </div>
        <div class="w3-col m3 s6">
            <div class="w3-card vet-stat-card">
                <div class="vet-stat-value">14</div>
                <div class="vet-stat-label">Vacunas pendientes</div>
            </div>
        </div>
        <div class="w3-col m3 s6">
            <div class="w3-card vet-stat-card">
                <div class="vet-stat-value">L. 4,320</div>
                <div class="vet-stat-label">Pagos pendientes</div>
            </div>
        </div>
    </div>

    <footer class="vet-footer">
        &copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($clinica); ?> — Panel administrativo de uso interno.
    </footer>
</div>

<script src="dashboard_vet.js"></script>
</body>
</html>
