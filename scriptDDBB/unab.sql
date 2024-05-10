-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2023 a las 02:49:02
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unab`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alertas`
--

CREATE TABLE `alertas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `origen` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cargo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `materia_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alertas`
--

INSERT INTO `alertas` (`id`, `titulo`, `descripcion`, `tipo`, `origen`, `status`, `user_id`, `cargo_id`, `materia_id`, `created_at`, `updated_at`) VALUES
(1, 'Alta de nuevo Cargo', 'Se ha dado de alta un nuevo cargo', '1', '2', '1', 1, 1, 2, '2023-05-08 15:19:30', '2023-05-08 16:42:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profesor_id` bigint(20) UNSIGNED NOT NULL,
  `bedel_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `profesor_id`, `bedel_id`, `subject_id`, `status`, `fecha`, `fecha_inicio`, `fecha_fin`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2, '1', NULL, '2023-05-01', '2023-05-25', 'porPeriodo', '2023-05-08 15:43:06', '2023-05-08 15:43:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers`
--

CREATE TABLE `careers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dateInit` date DEFAULT NULL,
  `data` text DEFAULT NULL,
  `college_id` bigint(20) UNSIGNED DEFAULT NULL,
  `years` double(8,2) DEFAULT NULL,
  `CodigoSIU` varchar(255) NOT NULL,
  `DenominacionCarrera` varchar(255) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `ResolucionAprobacionCS` varchar(255) DEFAULT NULL,
  `ResolucionCorrelativasCS` varchar(255) DEFAULT NULL,
  `ResolucionMinisterial` varchar(255) DEFAULT NULL,
  `coordinador_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `careers`
--

INSERT INTO `careers` (`id`, `name`, `dateInit`, `data`, `college_id`, `years`, `CodigoSIU`, `DenominacionCarrera`, `Titulo`, `ResolucionAprobacionCS`, `ResolucionCorrelativasCS`, `ResolucionMinisterial`, `coordinador_id`, `created_at`, `updated_at`) VALUES
(2, '', NULL, NULL, NULL, 0.00, 'Plan: (CCC-001)', 'CCC - LICENCIATURA EN ENSEÑANZA DE MATEMÁTICA', 'LICENCIADO/A EN ENSEÑANZA DE LA MATEMÁTICA', 'RR-38/19-CS', 'RR-88/22-CS', 'RESOL-2021-3219-APN-ME', NULL, NULL, NULL),
(3, '', NULL, NULL, NULL, 0.00, 'Plan: (L-001)', 'LICENCIATURA EN CIENCIAS DE DATOS', 'LICENCIADO/A EN CIENCIAS DE DATOS', 'RR-37/19-CS MODIFICADA POR RR-46/21-CS', 'RR-85/22-CS', 'RESOL-2019-3514-APN-MECCYT MODIFICADA POR RESOL-2022-88-APN-SECPU#ME ', NULL, NULL, NULL),
(4, '', NULL, NULL, NULL, 0.00, 'Plan: (L-002)', 'LICENCIATURA EN LOGÍSTICA Y TRANSPORTE', 'LICENCIADO/A EN LOGÍSTICA Y TRANSPORTE', 'RR-22/19-CS', '-------------------------------------', 'RESOL-2020-650-APN-ME', NULL, NULL, NULL),
(5, '', NULL, NULL, NULL, 0.00, 'Plan: (L-003)', 'LICENCIATURA EN ADMINISTRACIÓN', 'LICENCIADO/A EN ADMINISTRACIÓN', 'RR-23/19-CS', 'RR-87/22-CS', 'RESOL-2021-1035-APN-ME', NULL, NULL, NULL),
(6, '', NULL, NULL, NULL, 0.00, 'Plan: (L-004)', 'LICENCIATURA EN CIENCIA POLÍTICA', 'LICENCIADO/A EN CIENCIA POLÍTICA', 'CS-67/20-GA', 'CS-68/20-GA MODIFICADO POR RR-90/22-CS', 'RESOL-2021-2609-APN-ME', NULL, NULL, NULL),
(7, '', NULL, NULL, NULL, 0.00, 'Plan: (T-001)', 'TECNICATURA UNIVERSITARIA EN AUTOMATIZACIÓN Y CONTROL', 'TÉCNICO/A UNIVERSITARIO/A EN AUTOMATIZACIÓN Y CONTROL', 'RR-14/19-GB MODIFICADO POR RR-18/19-GB', 'RR-14/19-GB MODIFICADO POR RR-18/19-GB', 'RESOL-2719/19-APN-ME', NULL, NULL, NULL),
(8, '', NULL, NULL, NULL, 0.00, 'Plan: (T-002)', 'TECNICATURA UNIVERSITARIA EN GESTIÓN DE LAS ORGANIZACIONES', 'TÉCNICO/A UNIVERSITARIO/A EN GESTIÓN DE LAS ORGANIZACIONES', 'RR-16/19-GB', 'RR-16/19-GB MODIFICADO POR RR-89/22-CS', 'RESOL-2799/19-APN-ME', NULL, NULL, NULL),
(9, '', NULL, NULL, NULL, 0.00, 'Plan: (T-003)', 'TECNICATURA UNIVERSITARIA EN LOGÍSTICA Y TRANSPORTE', 'TÉCNICO/A UNIVERSITARIO/A EN LOGÍSTICA Y TRANSPORTE', 'RR-15/19-GB MODIFICADO POR RR-19/19-GB', 'RR-15/19-GB MODIFICADO POR RR-19/19-GB', 'RESOL-2019-2755-APN-ME', NULL, NULL, NULL),
(10, '', NULL, NULL, NULL, 0.00, 'Plan: (T-004)', 'TECNICATURA UNIVERSITARIA EN ACOMPAÑAMIENTO TERAPÉUTICO', 'TÉCNICO/A UNIVERSITARIO/A EN ACOMPAÑAMIENTO TERAPÉUTICO', 'RR-24/19-CS MODIFICADO POR CS-71/20-GA', 'CS-73/20-GA', 'RESOL-2021-1046-APN-ME', NULL, NULL, NULL),
(11, '', NULL, NULL, NULL, 0.00, 'Plan: (T-005)', 'TECNICATURA UNIVERSITARIA EN COMUNICACIÓN DIGITAL', 'TÉCNICO/A UNIVERSITARIO/A EN COMUNICACIÓN DIGITAL', 'RR-25/19-CS', 'RR-86/22-CS', 'RESOL-2020-493-APN-ME', NULL, NULL, NULL),
(12, '', NULL, NULL, NULL, 0.00, 'Plan: (T-006)', 'TECNICATURA UNIVERSITARIA EN DISEÑO Y DESARROLLO DE PRODUCTO', 'TÉCNICO/A UNIVERSITARIO/A EN DISEÑO Y DESARROLLO DE PRODUCTO', 'RR-26/19-CS MODIFICADO POR CS-72/20-GA', 'CS-74/20-GA', 'RESOL-2021-1631-APN-ME', NULL, NULL, NULL),
(13, '', NULL, NULL, NULL, 0.00, 'Plan: (T-007)', 'TECNICATURA UNIVERSITARIA EN PRÓTESIS DENTAL', 'TÉCNICO/A UNIVERSITARIO/A EN PRÓTESIS DENTAL', 'CS-69/20-GA', 'CS-70/20-GA MODIFICADO POR RR-79/21-CS', 'RESOL-2021-1647-APN-ME', NULL, NULL, NULL),
(14, '', NULL, NULL, NULL, 0.00, 'Plan: (T-008)', 'TECNICATURA UNIVERSITARIA EN PROGRAMACIÓN', 'TÉCNICO/A UNIVERSITARIO/A EN PROGRAMACIÓN', 'RR-54/21-CS', 'RR-55/21-CS', 'RESOL-2022-1151-APN-ME', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `persona_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `dedicacion_horaria` varchar(255) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `act_des` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `subject_id`, `persona_id`, `status`, `cargo`, `tipo`, `categoria`, `dedicacion_horaria`, `observaciones`, `fecha_alta`, `fecha_baja`, `act_des`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '1', NULL, 'Ordinario/Concursado', 'Profesor Titular (TIT)', 'Dedicación Exclusiva', NULL, '2023-01-01', '2023-05-09', '514554445', '2023-05-08 15:19:30', '2023-05-08 15:19:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colleges`
--

CREATE TABLE `colleges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dateInit` date NOT NULL,
  `data` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `coordinador_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tipo_de_sede` varchar(255) NOT NULL DEFAULT 'Presencial',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinadors`
--

CREATE TABLE `coordinadors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `coordinadors`
--

INSERT INTO `coordinadors` (`id`, `user_id`, `tipo`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, 'coordinador', 'activo', '2023-05-08 15:17:39', '2023-05-08 15:17:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinador_carreras`
--

CREATE TABLE `coordinador_carreras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coordinador_id` bigint(20) UNSIGNED NOT NULL,
  `carrera_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `coordinador_carreras`
--

INSERT INTO `coordinador_carreras` (`id`, `coordinador_id`, `carrera_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-05-08 15:17:39', '2023-05-08 15:17:39'),
(2, 1, 3, '2023-05-08 15:17:39', '2023-05-08 15:17:39'),
(3, 1, 4, '2023-05-08 15:17:39', '2023-05-08 15:17:39'),
(4, 1, 5, '2023-05-08 15:17:39', '2023-05-08 15:17:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinador_deptos`
--

CREATE TABLE `coordinador_deptos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coordinador_id` bigint(20) UNSIGNED NOT NULL,
  `depto_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinador_materias`
--

CREATE TABLE `coordinador_materias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coordinador_id` bigint(20) UNSIGNED NOT NULL,
  `materia_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `name`, `file_path`, `created_at`, `updated_at`) VALUES
(1, '1657548250_xtraSolicpracticaDisca - 2022-06-10T121710.812.pdf', '/storage/uploads/1657548250_xtraSolicpracticaDisca - 2022-06-10T121710.812.pdf', '2022-07-11 17:04:10', '2022-07-11 17:04:10'),
(2, '1657548918_certificado_alumno_regular.pdf', '/storage/uploads/1657548918_certificado_alumno_regular.pdf', '2022-07-11 17:15:18', '2022-07-11 17:15:18'),
(3, '1657549510_certificado_alumno_regular.pdf', '/storage/uploads/1657549510_certificado_alumno_regular.pdf', '2022-07-11 17:25:10', '2022-07-11 17:25:10'),
(4, '1657551963_certificado_alumno_regular.pdf', '/storage/uploads/1657551963_certificado_alumno_regular.pdf', '2022-07-11 18:06:03', '2022-07-11 18:06:03'),
(5, '1657551976_xtraSolicpracticaDisca - 2022-06-10T121710.812.pdf', '/storage/uploads/1657551976_xtraSolicpracticaDisca - 2022-06-10T121710.812.pdf', '2022-07-11 18:06:16', '2022-07-11 18:06:16'),
(6, '1657552403_xtraSolicpracticaDisca - 2022-06-10T121710.812.pdf', '/storage/uploads/1657552403_xtraSolicpracticaDisca - 2022-06-10T121710.812.pdf', '2022-07-11 18:13:23', '2022-07-11 18:13:23'),
(7, '1657552416_certificado_alumno_regular.pdf', '/storage/uploads/1657552416_certificado_alumno_regular.pdf', '2022-07-11 18:13:36', '2022-07-11 18:13:36'),
(8, '1659709903_TransferenciaTercero-28532558_28532558_22-07-2022.pdf', '/storage/uploads/1659709903_TransferenciaTercero-28532558_28532558_22-07-2022.pdf', '2022-08-05 17:31:43', '2022-08-05 17:31:43'),
(9, '1659710331_TransferenciaTercero-28532558_28532558_22-07-2022.pdf', '/storage/uploads/1659710331_TransferenciaTercero-28532558_28532558_22-07-2022.pdf', '2022-08-05 17:38:51', '2022-08-05 17:38:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_01_131754_create_user_types_table', 1),
(6, '2022_06_06_234030_create_personas_table', 1),
(7, '2022_06_10_151412_create_colleges_table', 1),
(8, '2022_06_10_152330_create_careers_table', 1),
(9, '2022_06_10_152459_create_subjects_table', 1),
(10, '2022_06_10_153751_create_cargos_table', 1),
(11, '2022_07_11_132638_create_files_table', 1),
(12, '2022_08_05_130022_create_permission_tables', 1),
(13, '2022_10_28_153608_create_asistencias_table', 1),
(14, '2022_11_17_154834_create_subject_career_table', 1),
(15, '2022_11_23_014338_create_coordinadors_table', 1),
(16, '2022_11_23_113107_create_alertas_table', 1),
(17, '2022_11_23_161743_create_coordinador_deptos_table', 1),
(18, '2022_11_23_161804_create_coordinador_carreras_table', 1),
(19, '2022_11_23_161821_create_coordinador_materias_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Persona', 1),
(6, 'App\\Models\\Persona', 2),
(7, 'App\\Models\\Persona', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `lastname` text NOT NULL,
  `address` text NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `doc` int(11) NOT NULL,
  `userType_id` bigint(20) UNSIGNED NOT NULL DEFAULT 5,
  `cv_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Docencia` varchar(255) DEFAULT 'No',
  `Investigacion` varchar(255) DEFAULT 'No',
  `Extension` varchar(255) DEFAULT 'No',
  `Gestion` varchar(255) DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `name`, `lastname`, `address`, `birth`, `gender`, `phone`, `email`, `doc`, `userType_id`, `cv_id`, `Docencia`, `Investigacion`, `Extension`, `Gestion`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'none', '2021-10-10', 'Otro', 'none', 'admin@admin.com', 0, 1, NULL, 'No', 'No', 'No', 'No', '2021-10-11 00:05:38', '2022-04-06 15:55:07'),
(2, 'Jorge Gustabo Rojas', 'Delledonne', '46 1482', '1980-12-08', 'Masculino', '+5492216337555', 'angel.leonardo.bianco@outlook.com', 22, 5, NULL, 'No', 'No', 'No', 'No', '2023-05-08 15:17:12', '2023-05-08 15:17:12'),
(3, 'Marcelo', 'Delledonne', 'Calle 46 nª 1482', '1900-12-22', 'No Binarie', '02215458808', 'doc@doc.com', 34, 4, NULL, 'No', 'No', 'No', 'No', '2023-05-08 15:19:30', '2023-05-08 15:19:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'api', '2022-11-28 14:27:21', '2022-11-28 14:27:21'),
(2, 'acaUno', 'api', '2022-11-28 14:27:30', '2022-11-28 14:27:30'),
(3, 'acaDos', 'api', '2022-11-28 14:27:36', '2022-11-28 14:27:36'),
(4, 'acaTres', 'api', '2022-11-28 14:27:43', '2022-11-28 14:27:43'),
(5, 'bedel', 'api', '2022-11-28 14:27:52', '2022-11-28 14:27:52'),
(6, 'coordinador', 'api', '2022-11-28 14:28:06', '2022-11-28 14:28:06'),
(7, 'profesor', 'api', '2022-11-28 14:28:17', '2022-11-28 14:28:17'),
(8, 'basic', 'api', '2022-11-28 14:28:25', '2022-11-28 14:28:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `abrev_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `credits` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `coordinador_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`id`, `code`, `name`, `abrev_name`, `type`, `year`, `semester`, `credits`, `status`, `coordinador_id`, `created_at`, `updated_at`) VALUES
(2, '00001', 'Taller de Ciencia, Tecnología y Sociedad', 'Taller de Ciencia, Tecnología y Sociedad', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 18:28:11'),
(3, '00002', 'Matemática general', 'Matemática general', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 18:30:02'),
(4, '00003', 'Medios de representación y dibujo mecánico', 'Medios de representación y Dibujo Mecánico', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 18:59:13'),
(5, '00004', 'Herramientas computacionales y programación para la ingeniería y la ciencia', 'Herramientas computacionales y programación para l', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:01:50'),
(6, '00005', 'Inglés', 'Inglés', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:08:15'),
(7, '00006', 'Automatización industrial I', 'Automatización industrial I', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:09:34'),
(8, '00007', 'Circuitos eléctricos', 'Circuitos eléctricos', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:11:17'),
(9, '00008', 'Metodología de Programación', 'Metodología de Programación', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:11:48'),
(10, '00009', 'Introducción a los relés inteligentes y microprocesadores', 'Introducción a los relés inteligentes y microproce', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:13:28'),
(11, '00010', 'Matemática aplicada', 'Matemática aplicada', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:13:50'),
(12, '00011', 'Sistemas de control', 'Sistemas de control', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:14:24'),
(13, '00012', 'Electrónica e instrumentación', 'Electrónica e instrumentación', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:14:37'),
(14, '00013', 'Gestión de la Calidad', 'Gestión de la Calidad', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:34:41'),
(15, '00014', 'Taller y práctica de laboratorio', 'Taller y práctica de laboratorio', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:15:52'),
(16, '00015', 'Automatización industrial II', 'Automatización industrial II', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:35:41'),
(17, '00016', 'Robótica técnica', 'Robótica técnica', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:36:03'),
(18, '00017', 'Microcontroladores', 'Microcontroladores', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:36:20'),
(19, '00019', 'Administración de la producción y mantenimiento', 'Administración de la producción y mantenimiento', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:36:47'),
(20, '00020', 'Control de máquinas eléctricas', 'Control de máquinas eléctricas', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:37:07'),
(21, '00021', 'Economía y procesos productivos', 'Economía y procesos productivos', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:37:36'),
(22, '00022', 'Práctica supervisada', 'Práctica supervisada', 'Anual', 'Tercero', NULL, NULL, 'activo', NULL, NULL, '2023-05-08 19:38:21'),
(23, '00023', 'Instrumentación y comunicaciones industriales', 'Instrumentación y comunicaciones industriales', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:38:43'),
(24, '00024', 'Higiene y seguridad industrial', 'Higiene y seguridad industrial', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:39:18'),
(25, '00025', 'Desarrollo de proyectos', 'Desarrollo de proyectos', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:39:28'),
(26, '00027', 'Comunicación institucional', 'Comunicación institucional', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:40:18'),
(27, '00028', 'Sistemas contables I', 'Sistemas contables I', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:40:42'),
(28, '00029', 'Matemática', 'Matemática', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:41:44'),
(29, '00030', 'Economía', 'Economía', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:42:36'),
(30, '00031', 'Administración', 'Administración', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:43:02'),
(31, '00032', 'Problemáticas Socio Contemporáneas', 'Problemáticas Socio Contemporáneas', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:43:31'),
(32, '00033', 'Teoría y comportamiento organizacional', 'Teoría y comportamiento organizacional', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:44:31'),
(33, '00034', 'Sociología de las organizaciones', 'Sociología de las organizaciones', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:45:08'),
(34, '00035', 'Sistemas contables II', 'Sistemas contables II', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:45:30'),
(35, '00036', 'Gestión de la producción', 'Gestión de la producción', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:45:52'),
(36, '00037', 'Estadística', 'Estadística', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:46:23'),
(37, '00038', 'Informática', 'Informática', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:47:05'),
(38, '00039', 'Gestión de cooperativas', 'Gestión de cooperativas', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:47:29'),
(39, '00040', 'Gestión de talento humano y relaciones laborales', 'Gestión de talento humano y relaciones laborales', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:47:53'),
(40, '00041', 'Gestión de costos', 'Gestión de costos', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:48:19'),
(41, '00042', 'Gestión de la comercialización e investigación comercial', 'Gestión de la comercialización e investigación com', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:48:42'),
(42, '00043', 'Taller y práctica profesionalizante', 'Taller y práctica profesionalizante', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:49:29'),
(43, '00044', 'Legislación comercial y tributaria', 'Legislación comercial y tributaria', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:49:49'),
(44, '00045', 'Estrategia empresarial', 'Estrategia empresarial', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:50:18'),
(45, '00046', 'Sistemas de información para la gestión de las organizaciones', 'Sistemas de información para la gestión de las org', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:50:46'),
(46, '00047', 'Práctica supervisada', 'Práctica supervisada', 'Anual', 'Tercero', NULL, NULL, 'activo', NULL, NULL, '2023-05-08 19:51:04'),
(47, '00048', 'Higiene, Seguridad y Gestión ambiental', 'Higiene, Seguridad y Gestión ambiental', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:51:33'),
(48, '00049', 'Evaluación y administración de proyecto', 'Evaluación y administración de proyecto', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:51:56'),
(49, '00050', 'Control de gestión', 'Control de gestión', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:52:26'),
(50, '00051', 'Logística I', 'Logística I', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:53:06'),
(51, '00052', 'Matemática', 'Matemática', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:53:29'),
(52, '00053', 'Sociología de las organizaciones', 'Sociología de las organizaciones', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:54:23'),
(53, '00054', 'Geografía e integración territorial', 'Geografía e integración territorial', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:55:00'),
(54, '00055', 'Distribución I', 'Distribución I', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:55:30'),
(55, '00056', 'Economía', 'Economía', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:55:52'),
(56, '00057', 'Principios de administración', 'Principios de administración', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:56:19'),
(57, '00058', 'Estadística aplicada a la logística', 'Estadística aplicada a la logística', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:56:47'),
(58, '00059', 'Logística II', 'Logística II', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:57:14'),
(59, '00060', 'Informática', 'Informática', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:57:49'),
(60, '00061', 'Gestión Organizacional', 'Gestión Organizacional', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 19:58:17'),
(61, '00062', 'Distribución II', 'Distribución II', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 19:59:24'),
(62, '00063', 'Gestión de calidad de producción y servicio', 'Gestión de calidad de producción y servicio', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:00:05'),
(63, '00064', 'Administración de inventario y compras', 'Administración de inventario y compras', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:00:41'),
(64, '00065', 'Legislación nacional e internacional', 'Legislación nacional e internacional', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:01:47'),
(65, '00066', 'Portugués', 'Portugués', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:02:16'),
(66, '00067', 'Logística III', 'Logística III', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:02:44'),
(67, '00068', 'Higiene, seguridad y gestión ambiental', 'Higiene, seguridad y gestión ambiental', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:03:15'),
(68, '00069', 'Práctica supervisada', 'Práctica supervisada', 'Anual', 'Tercero', NULL, NULL, 'activo', NULL, NULL, '2023-05-08 20:03:35'),
(69, '00070', 'Sistemas de información aplicados', 'Sistemas de información aplicados', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:04:03'),
(70, '00071', 'Marketing y comercialización', 'Marketing y comercialización', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:04:34'),
(71, '00072', 'Diseño de proyectos', 'Diseño de proyectos', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:05:17'),
(72, '00073', 'Contextualización del Campo Profesional del Acompañante Terapéutico I', 'Contextualización del Campo Profesional del Acompa', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:06:41'),
(73, '00074', 'Salud Pública y Salud Mental', 'Salud Pública y Salud Mental', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:07:12'),
(74, '00075', 'Psicopatología y Neurociencias', 'Psicopatología y Neurociencias', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:07:23'),
(75, '00076', 'Modalidades de Intervención en el Acompañante Terapéutico', 'Modalidades de Intervención en el Acompañante Tera', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:07:47'),
(76, '00077', 'Problemáticas Socio Contemporáneas', 'Problemáticas Socio Contemporáneas', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:07:56'),
(77, '00078', 'Taller y prácticas profesionalizantes 1', 'Taller y prácticas profesionalizantes 1', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:08:10'),
(78, '00079', 'Investigación en Salud', 'Investigación en Salud', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:08:33'),
(79, '00080', 'Ética y Ocupación Humana', 'Ética y Ocupación Humana', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:08:45'),
(80, '00081', 'Bioética y de Psicofarmacología.', 'Bioética y Psicofarmacología.', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:08:57'),
(81, '00082', 'Psicología de grupos', 'Psicología de grupos', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:09:11'),
(82, '00083', 'Gestión de cooperativas y voluntariados', 'Gestión de cooperativas y voluntariados', NULL, NULL, NULL, NULL, 'activo', NULL, NULL, NULL),
(83, '00084', 'Gestión de talento humano y relaciones laborales', 'Gestión de talento humano y relaciones laborales', NULL, NULL, NULL, NULL, 'activo', NULL, NULL, NULL),
(84, '00085', 'Sistemas Familiares', 'Sistemas Familiares', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:10:34'),
(85, '00086', 'Teorías del Desarrollo I. Infancia y Adolescencia', 'Teorías del Desarrollo I. Infancia y Adolescencia', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:10:42'),
(86, '00087', 'Taller y prácticas profesionalizantes 2', 'Taller y prácticas profesionalizantes 2', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:11:00'),
(87, '00088', 'Técnicas de Prevención', 'Técnicas de Prevención', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:11:14'),
(88, '00089', 'Teoria Psicosocial y Comunitaria', 'Teoria Psicosocial y Comunitaria', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:11:39'),
(89, '00090', 'Psicología de grupos II', 'Psicología de grupos II', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:12:08'),
(90, '00091', 'Teorías del Desarrollo II. Adultos y Adultos Mayores', 'Teorías del Desarrollo II. Adultos y Adultos Mayor', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:12:20'),
(91, '00092', 'Acompañamiento Terapéutico en la Niñez y la Adolescencia', 'Acompañamiento Terapéutico en la Niñez y la Adoles', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:12:34'),
(92, '00093', 'Intervención Comunitaria y Recursos Sociales', 'Intervención Comunitaria y Recursos Sociales', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:13:30'),
(93, '00094', 'Acompañamiento Terapéutico del Adulto y del Adulto Mayor', 'Acompañamiento Terapéutico del Adulto y del Adulto', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:13:50'),
(94, '00095', 'Taller y prácticas profesionalizantes 3', 'Taller y prácticas profesionalizantes 3', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:14:02'),
(95, '00096', 'Problemáticas de la Comunicación Social I', 'Problemáticas de la Comunicación Social I', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:14:26'),
(96, '00097', 'Tecnologías Digitales I', 'Tecnologías Digitales I', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:14:39'),
(97, '00098', 'Culturas Digitales I', 'Culturas Digitales I', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:15:00'),
(98, '00099', 'Psicología y Comunicación Social', 'Psicología y Comunicación Social', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:15:10'),
(99, '00100', 'Prácticas y Análisis del Discurso', 'Prácticas y Análisis del Discurso', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:15:21'),
(100, '00101', 'Tecnologías Digitales II', 'Tecnologías Digitales II', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:15:45'),
(101, '00102', 'Problemáticas de la Comunicación Social II', 'Problemáticas de la Comunicación Social II', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:16:08'),
(102, '00103', 'Fundamentos del Big Data', 'Fundamentos del Big Data', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:16:54'),
(103, '00104', 'Narrativas Digitales', 'Narrativas Digitales', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:17:16'),
(104, '00105', 'Culturas digitales II', 'Culturas digitales II', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:17:57'),
(105, '00106', 'Periodismo digital y nuevos medios I', 'Periodismo digital y nuevos medios I', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:18:09'),
(106, '00107', 'Pensamiento de Diseño I', 'Pensamiento de Diseño I', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:18:19'),
(107, '00108', 'Comunicación digital en organizaciones', 'Comunicación digital en organizaciones', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:18:30'),
(108, '00109', 'Planificación y Marketing digital', 'Planificación y Marketing digital', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:19:00'),
(109, '00110', 'Gestión de la Comunicación Digital', 'Gestión de la Comunicación Digital', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:19:14'),
(110, '00111', 'Lenguajes de Programación', 'Lenguajes de Programación', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:19:24'),
(111, '00112', 'Producción de Materiales Educativos Digitales', 'Producción de Materiales Educativos Digitales', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:19:38'),
(112, '00113', 'Periodismo digital y nuevos medios II', 'Periodismo digital y nuevos medios II', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:20:24'),
(113, '00114', 'Pensamiento de Diseño II', 'Pensamiento de Diseño II', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:20:35'),
(114, '00115', 'Taller de producción y edición multimedia', 'Taller de producción y edición multimedia', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:20:44'),
(115, '00116', 'Comunicación digital de gobierno y ciudades inteligentes', 'Comunicación digital de gobierno y ciudades inteli', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:20:58'),
(116, '00117', 'Transporte terrestre', 'Transporte terrestre', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:21:21'),
(117, '00118', 'Matemática aplicada a la logística', 'Matemática aplicada a la logística', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:21:43'),
(118, '00119', 'Transporte aéreo', 'Transporte aéreo', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:22:03'),
(119, '00120', 'Metodología de las Ciencias', 'Metodología de las Ciencias', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:22:22'),
(120, '00121', 'Práctica supervisada', 'Práctica supervisada', 'Anual', 'Tercero', NULL, NULL, 'activo', NULL, NULL, '2023-05-08 20:22:39'),
(121, '00122', 'Comercio internacional', 'Comercio internacional', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:22:59'),
(122, '00123', 'Transporte maritítimo y fluvial', 'Transporte maritítimo y fluvial', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:23:40'),
(123, '00124', 'Gestión con Materiales Peligrosos', 'Gestión con Materiales Peligrosos', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:23:49'),
(124, '00125', 'Administración de personal', 'Administración de personal', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:23:59'),
(125, '00126', 'Portugués II', 'Portugués II', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:24:09'),
(126, '00127', 'Taller de Problemáticas contemporáneas de logística y transporte', 'Taller de Problemáticas contemporáneas de logístic', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:24:23'),
(127, '00128', 'Planeamiento estratégico', 'Planeamiento estratégico', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:24:47'),
(128, '00129', 'Seguridad operativa', 'Seguridad operativa', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:24:58'),
(129, '00130', 'Logística sustentable', 'Logística sustentable', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:25:09'),
(130, '00131', 'Taller trabajo de integración final', 'Taller trabajo de integración final', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:25:20'),
(131, '00132', 'Fundamentos del Diseño e Introducción Proyectual', 'Fundamentos del Diseño e Introducción Proyectual', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:25:41'),
(132, '00133', 'Técnicas de Representación Gráfica', 'Materiales', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:26:15'),
(133, '00134', 'Elementos de Matemática y Física', 'Matemática aplicada', NULL, NULL, NULL, NULL, 'activo', NULL, NULL, NULL),
(134, '00135', 'Historia del Arte y el Diseño', 'Historia del Arte y el Diseño', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:26:39'),
(135, '00136', 'Laboratorio de Materiales', 'Higiene y seguridad industrial', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:27:01'),
(136, '00137', 'Comunicación de Proyecto', 'Tecnología y producción III', NULL, NULL, NULL, NULL, 'activo', NULL, NULL, NULL),
(137, '00138', 'Semiótica', 'Semiótica', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:27:39'),
(138, '00139', 'Morfología I', 'Morfología I', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:28:05'),
(139, '00140', 'Taller de Diseño I  Desarrollo de Producto', 'Taller de Diseño I  Desarrollo de Producto', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:28:33'),
(140, '00141', 'Informática del Diseño I', 'Informática del Diseño I', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:28:44'),
(141, '00142', 'Historia del Diseño Industrial', 'Historia del Diseño Industrial', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:28:54'),
(142, '00143', 'Morfología II', 'Morfología II', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:31:33'),
(143, '00144', 'Taller de Diseño II  Forma y Función', 'Taller de Diseño II  Forma y Función', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:32:39'),
(144, '00145', 'Informática del Diseño II', 'Informática del Diseño II', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:32:52'),
(145, '00146', 'Historia del Diseño del Producto', 'Historia del Diseño del Producto', NULL, NULL, NULL, NULL, 'activo', NULL, NULL, NULL),
(146, '00147', 'Tecnología y Producción I', 'Tecnología y Producción I', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:33:28'),
(147, '00148', 'Taller de Diseño III  Concepto y Tecnología', 'Taller de Diseño III  Concepto y Tecnología', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:34:13'),
(148, '00149', 'Economía, Industria y Desarrollo', 'Economía, Industria y Desarrollo', NULL, NULL, NULL, NULL, 'activo', NULL, NULL, NULL),
(149, '00150', 'Ergonomía', 'Ergonomía', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:34:27'),
(150, '00151', 'Tecnología y Producción II', 'Tecnología y Producción II', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:34:51'),
(151, '00152', 'Práctica supervisada', 'Práctica supervisada', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:35:16'),
(152, '00153', 'Trabajo Final Integrador', 'Trabajo Final Integrador', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:36:01'),
(153, '00154', 'Historia económica y social', 'Historia económica y social', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:36:34'),
(154, '00155', 'Gestión de las relaciones laborales', 'Gestión de las relaciones laborales', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:37:09'),
(155, '00156', 'Macroeconomía', 'Macroeconomía', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:37:40'),
(156, '00157', 'Administración pública', 'Administración pública', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:38:01'),
(157, '00158', 'Matemática financiera', 'Matemática financiera', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:38:17'),
(158, '00159', 'Métodos de investigación en ciencias sociales', 'Métodos de investigación en ciencias sociales', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:38:35'),
(159, '00160', 'Derecho del trabajo y seguridad social', 'Derecho del trabajo y seguridad social', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:38:48'),
(160, '00161', 'Estadística aplicada a la administración', 'Estadística aplicada a la administración', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:39:03'),
(161, '00162', 'Derecho civil y comercial', 'Derecho civil y comercial', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:39:18'),
(162, '00163', 'Finanzas públicas', 'Finanzas públicas', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:39:59'),
(163, '00164', 'Microeconomía', 'Microeconomía', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:40:12'),
(164, '00165', 'Economía social', 'Economía social', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:40:26'),
(165, '00166', 'Administración financiera', 'Administración financiera', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:40:40'),
(166, '00167', 'Comercio exterior', 'Comercio exterior', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:40:51'),
(167, '00168', 'Administración de la producción', 'Administración de la producción', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:41:08'),
(168, '00169', 'Marketing', 'Marketing', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:41:19'),
(169, '00170', 'Taller Trabajo de integración final', 'Taller Trabajo de integración final', 'Anual', 'Quinto', NULL, NULL, 'activo', NULL, NULL, '2023-05-08 20:41:38'),
(170, '00171', 'Acompañamiento Terapéutico en el campo de las Adicciones', 'Acompañamiento Terapéutico en el campo de las Adic', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:41:55'),
(171, '00172', 'Fundamentos de Psicología General y de Intervención Socio-comunitaria', 'Fundamentos de Psicología General y de Intervenció', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:42:09'),
(172, '00173', 'Análisis Matemático I', 'Análisis Matemático I', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:43:01'),
(173, '00174', 'Herramientas computacionales', 'Herramientas computacionales', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:43:07'),
(174, '00175', 'Introducción a la Programación', 'Introducción a la Programación', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:43:22'),
(175, '00176', 'Análisis Matemático II', 'Análisis Matemático II', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:43:31'),
(176, '00177', 'Álgebra', 'Álgebra', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:43:58'),
(177, '00178', 'Administración', 'Administración', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:44:25'),
(178, '00179', 'Economía', 'Economía', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:45:12'),
(179, '00180', 'Probabilidad y Estadística', 'Probabilidad y Estadística', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:45:38'),
(180, '00181', 'Recolección de Datos y Análisis Primario de la Información', 'Recolección de Datos y Análisis Primario de la Inf', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:46:13'),
(181, '00182', 'Introducción al Análisis Contable y Financiero', 'Introducción al Análisis Contable y Financiero', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:46:28'),
(182, '00183', 'Inferencia Estadística y reconocimiento de patrones', 'Inferencia Estadística y reconocimiento de patrone', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:47:39'),
(183, '00184', 'Algoritmos y estructuras de Datos', 'Algoritmos y estructuras de Datos', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:48:03'),
(184, '00185', 'Metodologías de investigación', 'Metodologías de investigación', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:48:21'),
(185, '00186', 'Gestión de Datos', 'Gestión de Datos', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:48:45'),
(186, '00187', 'Modelado y Simulación', 'Modelado y Simulación', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:49:00'),
(187, '00188', 'Visualización de la información', 'Visualización de la información', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:49:21'),
(188, '00189', 'Programación Avanzada', 'Programación Avanzada', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:49:41'),
(189, '00190', 'Análisis Multivariado', 'Análisis Multivariado', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-08 20:50:01'),
(190, '00191', 'Inteligencia Artificial', 'Inteligencia Artificial', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:50:21'),
(191, '00192', 'Análisis en Redes Sociales', 'Análisis en Redes Sociales', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-08 20:50:37'),
(192, '00193', 'Taller I - Big Data y las políticas públicas', 'Taller I - Big Data y las políticas públicas', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:13:29'),
(193, '00194', 'Técnicas de Investigación de Mercado', 'Técnicas de Investigación de Mercado', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:13:59'),
(194, '00195', 'Computación en la Nube', 'Computación en la Nube', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:14:22'),
(195, '00196', 'Comercio Electrónico', 'Comercio Electrónico', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:14:35'),
(196, '00197', 'Taller II  Big Data y la salud', 'Taller II  Big Data y la salud', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:14:44'),
(197, '00198', 'Formulación y evaluación de proyectos tecnológicos', 'Formulación y evaluación de proyectos tecnológicos', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:15:04'),
(198, '00199', 'Seminario Final', 'Seminario Final', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:15:38'),
(199, '00200', 'Práctica Profesional Supervisada (PPS)', 'Práctica Profesional Supervisada (PPS)', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:15:46'),
(200, '00201', 'Didáctica de la Matemática', 'Didáctica de la Matemática', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:17:05'),
(201, '00202', 'Epistemología e Historia de la Matemática', 'Epistemología e Historia de la Matemática', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:17:18'),
(202, '00203', 'Álgebra lineal y fundamentos de la geometría y su enseñanza', 'Álgebra lineal y fundamentos de la geometría y su', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:19:11'),
(203, '00204', 'Taller de Intervención y reflexión pedagógica', 'Taller de Intervención y reflexión pedagógica', 'Anual', 'Primero', NULL, NULL, 'activo', NULL, NULL, '2023-05-09 02:19:23'),
(204, '00205', 'Diseño y desarrollo curricular', 'Diseño y desarrollo curricular', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:20:53'),
(205, '00206', 'Sujetos de la educación', 'Sujetos de la educación', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:22:02'),
(206, '00207', 'Análisis Numérico y su enseñanza', 'Análisis Numérico y su enseñanza', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:22:11'),
(207, '00208', 'Análisis Vectorial I y su enseñanza', 'Análisis Vectorial I y su enseñanza', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:27:19'),
(208, '00209', 'Inclusión educativa y discapacidad', 'Inclusión educativa y discapacidad', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:28:04'),
(209, '00210', 'Probabilidad y Estadística y su enseñanza', 'Probabilidad y Estadística y su enseñanza', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:29:24'),
(210, '00211', 'Ecuaciones Diferenciales I y su enseñanza', 'Ecuaciones Diferenciales I y su enseñanza', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:29:33'),
(211, '00212', 'Análisis Complejo y su enseñanza', 'Análisis Complejo y su enseñanza', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:31:49'),
(212, '00213', 'Trayecto de integración formativa (anual)', 'Trayecto de integración formativa (anual)', 'Anual', 'Segundo', NULL, NULL, 'activo', NULL, NULL, '2023-05-09 02:32:25'),
(213, '00214', 'Evaluación', 'Evaluación', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:32:41'),
(214, '00215', 'Ecuaciones diferenciales II y su enseñanza', 'Ecuaciones diferenciales II y su enseñanza', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:32:50'),
(215, '00216', 'Análisis Vectorial II y su enseñanza', 'Análisis Vectorial II y su enseñanza', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:32:57'),
(216, '00217', 'Tecnologías aplicadas a la enseñanza de la Matemática', 'Tecnologías aplicadas a la enseñanza de la Matemát', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:33:07'),
(217, '00218', 'Comunicación institucional', 'Comunicación institucional', NULL, NULL, NULL, NULL, 'activo', NULL, NULL, NULL),
(218, '00221', 'Introducción a la Ciencia Política', 'Introducción a la Ciencia Política', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:44:07'),
(219, '00222', 'Teoría Política', 'Teoría Política', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:45:51'),
(220, '00223', 'Derecho', 'Derecho', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:46:00'),
(221, '00224', 'Sociología', 'Sociología', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:46:34'),
(222, '00225', 'Epistemología', 'Epistemología', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:47:25'),
(223, '00226', 'Historia Argentina y latinoamericana', 'Historia Argentina y latinoamericana', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:47:35'),
(224, '00227', 'Teoría Política Contemporánea', 'Teoría Política Contemporánea', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:47:55'),
(225, '00228', 'Derecho Administrativo', 'Derecho Administrativo', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:48:02'),
(226, '00229', 'Instituciones Políticas y de gobierno', 'Instituciones Políticas y de gobierno', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:48:14'),
(227, '00230', 'Actores Sociales', 'Actores Sociales', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:49:01'),
(228, '00231', 'Relaciones Internacionales I', 'Relaciones Internacionales I', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:49:08'),
(229, '00232', 'Análisis de las políticas públicas', 'Análisis de las políticas públicas', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 02:49:14'),
(230, '00233', 'Gobierno Local', 'Gobierno Local', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 02:49:35'),
(231, '00234', 'Opinión Pública', 'Opinión Pública', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:05:43'),
(232, '00236', 'Teoría de los partidos políticos', 'Teoría de los partidos políticos', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:06:33'),
(233, '00237', 'Teoría política analítica', 'Teoría política analítica', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:06:41'),
(234, '00238', 'Relaciones Internacionales II', 'Relaciones Internacionales II', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:06:49'),
(235, '00239', 'Política Argentina', 'Política Argentina', 'Semestral', 'Cuarto', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:08:20'),
(236, '00241', 'Institución presidencial y poder ejecutivo', 'Institución presidencial y poder ejecutivo', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:09:07'),
(237, '00242', 'Análisis Político', 'Análisis Político', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:09:17'),
(238, '00243', 'Historia Argentina y Latinoamericana del siglo XX', 'Historia Argentina y Latinoamericana del siglo XX', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:09:30'),
(239, '00244', 'Comunicación Política', 'Comunicación Política', 'Semestral', 'Cuarto', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:09:42'),
(240, '00246', 'Física-Química', 'Física-Química', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:10:21'),
(241, '00247', 'Anatomía y biología bucal', 'Anatomía y biología bucal', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:10:33'),
(242, '00248', 'Oclusion', 'Oclusion', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:11:22'),
(243, '00249', 'Materiales dentales', 'Materiales dentales', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:11:34'),
(244, '00250', 'Digitalización', 'Digitalización', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:11:45'),
(245, '00251', 'Diagnóstico y odontología digital I', 'Diagnóstico y odontología digital I', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:12:06'),
(246, '00252', 'Prótesis removible', 'Prótesis removible', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:12:17'),
(247, '00253', 'Digitalización y Diseño I', 'Digitalización y Diseño I', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:12:26'),
(248, '00254', 'Prótesis fija', 'Prótesis fija', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:12:43'),
(249, '00255', 'Digitalización y Diseño II', 'Digitalización y Diseño II', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:12:50'),
(250, '00256', 'Procesos de Gestión de Laboratorio dental', 'Procesos de Gestión de Laboratorio dental', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:12:58'),
(251, '00257', 'Metodología de la Investigación', 'Metodología de la Investigación', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:13:17'),
(252, '00258', 'Prótesis implanto asistida', 'Prótesis implanto asistida', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:15:56'),
(253, '00259', 'Diagnóstico y odontología digital II', 'Diagnóstico y odontología digital II', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:16:05'),
(254, '00260', 'Digitalización y Diseño III', 'Digitalización y Diseño III', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:16:23'),
(255, '00261', 'Práctica Profesional Supervisada', 'Práctica Profesional Supervisada', 'Anual', 'Tercero', NULL, NULL, 'activo', NULL, NULL, '2023-05-09 03:16:39'),
(256, '00262', 'Cirugía guiada', 'Cirugía guiada', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:17:08'),
(257, '00262', 'Representación y Modelado Digital', 'Representación y Modelado Digital', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:17:45'),
(258, '00263', 'Ortodoncia y ortopedia', 'Ortodoncia y ortopedia', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:18:01'),
(259, '00263', 'Diseño Industrial', 'Diseño Industrial', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:18:15'),
(260, '00264', 'Metodos del Diseño', 'Metodos del Diseño', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:18:28'),
(261, '00265', 'Ciencia aplicada al Diseño y desarrollo de Productos', 'Ciencia aplicada al Diseño y desarrollo de Product', 'Semestral', 'Segundo', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:23:13'),
(262, '00266', 'Gestión de Empresas de Diseño', 'Gestión de Empresas de Diseño', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:29:45'),
(263, '002667', 'Gestión de la calidad', 'Gestión de la calidad', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:30:27'),
(264, '00268', 'Tecnología y Producción III', 'Tecnología y Producción III', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:31:20'),
(265, '00269', 'Ciencia, Tecnología e Innovación', 'Ciencia, Tecnología e Innovación', 'Semestral', 'Primero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:31:39'),
(266, '00270', 'Organización de Computadoras', 'Organización de Computadoras', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:32:41'),
(267, '00271', 'Estructuras de Datos', 'Estructuras de Datos', 'Semestral', 'Primero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:32:51'),
(268, '00272', 'Programación Avanzada', 'Programación Avanzada', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:33:10'),
(269, '00273', 'Desarrollo de Software', 'Desarrollo de Software', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:33:19'),
(270, '00274', 'Inglés Comunicacional', 'Inglés Comunicacional', 'Semestral', 'Segundo', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:33:57'),
(271, '00275', 'Sistemas Operativos', 'Sistemas Operativos', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:34:15'),
(272, '00276', 'Redes de Computadoras', 'Redes de Computadoras', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:38:28'),
(273, '00277', 'Conceptos y Paradigmas de Lenguajes de Programación', 'Conceptos y Paradigmas de Lenguajes de Programació', 'Semestral', 'Tercero', 'Primero', NULL, 'activo', NULL, NULL, '2023-05-09 03:38:47'),
(274, '00278', 'Programación Concurrente', 'Programación Concurrente', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:39:04'),
(275, '00279', 'Metodologías Ágiles para el Desarrollo de Software', 'Metodologías Ágiles para el Desarrollo de Software', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:39:12'),
(276, '00280', 'Práctica Profesional Supervisada (PPS)', 'Práctica Profesional Supervisada (PPS)', 'Semestral', 'Tercero', 'Segundo', NULL, 'activo', NULL, NULL, '2023-05-09 03:39:21'),
(277, 'CPU-0001', 'Introducción a los Estudios Universitarios', 'Introducción a los estudios universitarios', NULL, NULL, NULL, NULL, 'activo', NULL, NULL, NULL),
(278, 'CPU-0002', 'Taller de Sensibilización en Perspectiva De Genero Y Derechos Humanos', 'Taller de Sensibilización en Perspectiva De Genero', NULL, NULL, NULL, NULL, 'activo', NULL, NULL, NULL),
(279, 'CPU-0003', 'Matemática ', 'Matemática ', NULL, NULL, NULL, NULL, 'activo', NULL, NULL, NULL),
(280, 'CPU-0004', 'Introducción A Las Ciencias Sociales', 'Introducción A Las Ciencias Sociales', NULL, NULL, NULL, NULL, 'activo', NULL, NULL, NULL),
(281, 'CPU-0005', 'Fundamentos Basicos de Ciencias de la Salud', 'Fundamentos Basicos de Ciencias de la Salud', NULL, NULL, NULL, NULL, 'activo', NULL, NULL, NULL),
(282, '00235', 'Seminario I', 'Seminario I', 'Semestral', 'Tercero', 'Segundo', NULL, NULL, NULL, '2023-05-09 03:41:09', '2023-05-09 03:41:09'),
(283, '00240', 'Seminario II', 'Seminario II', 'Semestral', 'Cuarto', 'Primero', NULL, NULL, NULL, '2023-05-09 03:41:53', '2023-05-09 03:41:53'),
(284, '00245', 'Seminario III', 'Seminario III', 'Semestral', 'Cuarto', 'Segundo', NULL, NULL, NULL, '2023-05-09 03:42:14', '2023-05-09 03:42:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subject_career`
--

CREATE TABLE `subject_career` (
  `subject_id` int(10) UNSIGNED NOT NULL,
  `career_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subject_career`
--

INSERT INTO `subject_career` (`subject_id`, `career_id`) VALUES
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(3, 7),
(3, 14),
(4, 7),
(4, 12),
(5, 7),
(5, 13),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 11),
(6, 12),
(6, 13),
(6, 14),
(7, 7),
(8, 7),
(9, 7),
(10, 7),
(11, 7),
(12, 7),
(13, 7),
(14, 7),
(15, 7),
(5, 12),
(16, 7),
(17, 7),
(18, 7),
(19, 7),
(20, 7),
(21, 7),
(22, 7),
(23, 7),
(24, 7),
(25, 7),
(26, 5),
(26, 6),
(26, 8),
(26, 10),
(27, 5),
(27, 8),
(28, 5),
(28, 6),
(28, 8),
(28, 12),
(28, 13),
(29, 5),
(29, 6),
(29, 8),
(30, 5),
(30, 8),
(31, 5),
(31, 6),
(31, 8),
(32, 5),
(32, 8),
(33, 5),
(33, 6),
(33, 8),
(34, 5),
(34, 8),
(35, 5),
(35, 8),
(36, 5),
(36, 6),
(36, 8),
(37, 5),
(37, 6),
(37, 8),
(37, 10),
(38, 5),
(38, 8),
(39, 8),
(40, 5),
(40, 8),
(41, 5),
(41, 8),
(42, 8),
(43, 5),
(43, 8),
(44, 5),
(44, 8),
(45, 5),
(45, 8),
(46, 8),
(47, 5),
(47, 8),
(48, 5),
(48, 8),
(49, 5),
(49, 8),
(50, 4),
(50, 9),
(51, 4),
(51, 9),
(52, 4),
(52, 9),
(53, 4),
(53, 9),
(54, 4),
(54, 9),
(55, 4),
(55, 9),
(56, 4),
(56, 9),
(57, 4),
(57, 9),
(58, 4),
(58, 9),
(59, 4),
(59, 9),
(60, 4),
(60, 9),
(61, 4),
(61, 9),
(62, 4),
(62, 9),
(63, 4),
(63, 9),
(64, 4),
(64, 9),
(65, 4),
(65, 9),
(66, 4),
(66, 9),
(67, 4),
(67, 9),
(68, 9),
(69, 4),
(69, 9),
(70, 4),
(70, 9),
(71, 4),
(71, 9),
(72, 10),
(73, 10),
(74, 10),
(75, 10),
(76, 10),
(77, 10),
(78, 10),
(79, 10),
(80, 10),
(81, 10),
(84, 10),
(85, 10),
(86, 10),
(87, 10),
(88, 10),
(89, 10),
(90, 10),
(91, 10),
(92, 10),
(93, 10),
(94, 10),
(95, 11),
(96, 11),
(97, 11),
(98, 11),
(99, 11),
(100, 11),
(101, 11),
(102, 6),
(102, 11),
(103, 11),
(104, 11),
(105, 11),
(106, 11),
(107, 11),
(108, 11),
(109, 11),
(110, 11),
(111, 11),
(112, 11),
(113, 11),
(114, 11),
(115, 11),
(116, 4),
(117, 4),
(118, 4),
(119, 4),
(120, 4),
(121, 4),
(122, 4),
(123, 4),
(124, 4),
(125, 4),
(126, 4),
(127, 4),
(128, 4),
(129, 4),
(130, 4),
(131, 12),
(132, 12),
(134, 12),
(135, 12),
(137, 12),
(138, 12),
(139, 12),
(140, 12),
(141, 12),
(142, 12),
(143, 12),
(144, 12),
(146, 12),
(147, 12),
(149, 12),
(150, 12),
(151, 12),
(152, 12),
(153, 5),
(153, 6),
(154, 5),
(155, 5),
(155, 6),
(156, 5),
(156, 6),
(157, 5),
(158, 5),
(158, 6),
(159, 5),
(160, 5),
(161, 5),
(162, 5),
(162, 6),
(163, 5),
(164, 5),
(165, 5),
(166, 5),
(167, 5),
(168, 5),
(169, 5),
(170, 10),
(171, 10),
(172, 3),
(173, 3),
(174, 3),
(175, 3),
(176, 3),
(176, 14),
(177, 3),
(178, 3),
(179, 3),
(179, 14),
(180, 3),
(181, 3),
(182, 3),
(182, 14),
(183, 3),
(183, 14),
(184, 3),
(185, 3),
(185, 14),
(186, 3),
(187, 3),
(187, 14),
(188, 3),
(188, 14),
(189, 3),
(190, 3),
(190, 14),
(191, 3),
(192, 3),
(193, 3),
(194, 3),
(195, 3),
(196, 3),
(197, 3),
(198, 3),
(199, 3),
(200, 2),
(201, 2),
(202, 2),
(203, 2),
(204, 2),
(205, 2),
(206, 2),
(207, 2),
(208, 2),
(209, 2),
(210, 2),
(211, 2),
(212, 2),
(213, 2),
(214, 2),
(215, 2),
(216, 2),
(218, 6),
(219, 6),
(220, 6),
(221, 6),
(222, 6),
(223, 6),
(224, 6),
(225, 6),
(226, 6),
(227, 6),
(228, 6),
(229, 6),
(230, 6),
(231, 6),
(232, 6),
(233, 6),
(234, 6),
(235, 6),
(236, 6),
(237, 6),
(238, 6),
(239, 6),
(240, 13),
(241, 13),
(242, 13),
(243, 13),
(244, 13),
(245, 13),
(246, 13),
(247, 13),
(248, 13),
(249, 13),
(250, 13),
(251, 13),
(252, 13),
(253, 13),
(254, 13),
(255, 13),
(256, 13),
(257, 12),
(258, 13),
(259, 12),
(260, 12),
(261, 12),
(262, 12),
(263, 12),
(264, 12),
(265, 14),
(266, 14),
(267, 14),
(268, 14),
(269, 14),
(270, 14),
(271, 14),
(272, 14),
(273, 14),
(274, 14),
(275, 14),
(276, 14),
(282, 6),
(283, 6),
(284, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `persona_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `email_verified_at`, `password`, `persona_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'admin', '2021-10-11 00:05:52', '$2y$10$xEw4f7XlfmC1S70sQs3h5uI1oh6N.3Err3Eldjh9uGHwqkVKzYIT2', 1, NULL, '2021-10-11 00:05:38', '2022-04-06 15:55:07'),
(2, 'angel.leonardo.bianco@outlook.com', 'coord', NULL, '$2y$10$/Dny9RmKuK044CBgiaCdpeKpI9OdUXx9oXl3RtSbFRDLoIdzk2Wnm', 2, NULL, '2023-05-08 15:17:12', '2023-05-08 15:17:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_types`
--

INSERT INTO `user_types` (`id`, `type`, `data`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin', 'Administrador', '2021-10-11 00:05:38', '2022-04-06 15:55:07'),
(2, 'academic1', 'academic1', 'Académico Nivel 1', '2021-10-11 00:05:38', '2022-04-06 15:55:07'),
(3, 'academic2', 'academic2', 'Académico Nivel 2', '2021-10-11 00:05:38', '2022-04-06 15:55:07'),
(4, 'profesor', 'profesor', 'Profesor', '2021-10-11 00:05:38', '2022-04-06 15:55:07'),
(5, 'basic', 'basic', 'Básico', '2021-10-11 00:05:38', '2022-04-06 15:55:07'),
(6, 'bedel', 'bedel', 'Bedel', '2021-10-11 00:05:38', '2022-04-06 15:55:07'),
(7, 'coordinador', 'coordinador', 'Coordinador', '2021-10-11 00:05:38', '2022-04-06 15:55:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alertas`
--
ALTER TABLE `alertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coordinadors`
--
ALTER TABLE `coordinadors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coordinador_carreras`
--
ALTER TABLE `coordinador_carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coordinador_deptos`
--
ALTER TABLE `coordinador_deptos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coordinador_materias`
--
ALTER TABLE `coordinador_materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subject_career`
--
ALTER TABLE `subject_career`
  ADD KEY `subject_career_subject_id_foreign` (`subject_id`),
  ADD KEY `subject_career_career_id_foreign` (`career_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indices de la tabla `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alertas`
--
ALTER TABLE `alertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `coordinadors`
--
ALTER TABLE `coordinadors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `coordinador_carreras`
--
ALTER TABLE `coordinador_carreras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `coordinador_deptos`
--
ALTER TABLE `coordinador_deptos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `coordinador_materias`
--
ALTER TABLE `coordinador_materias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `subject_career`
--
ALTER TABLE `subject_career`
  ADD CONSTRAINT `subject_career_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`),
  ADD CONSTRAINT `subject_career_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
