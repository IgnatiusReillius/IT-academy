-- Consultas para la base de datos "tienda"
SELECT nombre FROM producto;
SELECT nombre, precio FROM producto;
SELECT * FROM producto;
SELECT nombre, precio, precio * 1.17 FROM producto;
SELECT nombre AS "nombre del producto", precio AS "€", precio * 1.17 AS "$" FROM producto;
SELECT UPPER(nombre) AS "nombre", precio FROM producto;
SELECT LOWER(nombre) AS "nombre", precio FROM producto;
SELECT nombre, CONCAT(UPPER(SUBSTRING(nombre, 1, 2)), SUBSTRING(nombre, 3)) AS "nombre especial" FROM producto;
SELECT nombre, ROUND(precio, 2) AS "precio redondeado" FROM producto;
SELECT nombre, TRUNCATE(precio) AS "precio truncado" FROM producto;
SELECT codigo_fabricante FROM producto;
SELECT DISTINCT codigo_fabricante FROM producto;
SELECT nombre FROM fabricante ORDER BY nombre ASC;
SELECT nombre FROM fabricante ORDER BY nombre DESC;
SELECT nombre, precio FROM producto ORDER BY nombre ASC, precio DESC;
SELECT * FROM fabricante LIMIT 5;
SELECT * FROM fabricante LIMIT 2 OFFSET 3;
SELECT nombre, precio FROM producto ORDER BY precio ASC LIMIT 1;
SELECT nombre, precio FROM producto ORDER BY precio DESC LIMIT 1;
SELECT * FROM producto WHERE codigo_fabricante = 2;
SELECT producto.nombre AS "producto", producto.precio, fabricante.nombre AS "fabricante" FROM producto, fabricante WHERE producto.codigo_fabricante = fabricante.codigo;
SELECT producto.nombre AS "producto", producto.precio, fabricante.nombre AS "fabricante" FROM producto, fabricante WHERE producto.codigo_fabricante = fabricante.codigo ORDER BY fabricante;
SELECT producto.codigo AS "código del producto", producto.nombre AS "producto", producto.codigo_fabricante AS "código del fabricante", fabricante.nombre AS "fabricante" FROM producto, fabricante WHERE producto.codigo_fabricante = fabricante.codigo;
SELECT producto.nombre AS "producto", precio, fabricante.nombre AS "fabricante" FROM producto, fabricante WHERE producto.codigo_fabricante = fabricante.codigo ORDER BY precio ASC LIMIT 1;
SELECT producto.nombre AS "producto", precio, fabricante.nombre AS "fabricante" FROM producto, fabricante WHERE producto.codigo_fabricante = fabricante.codigo ORDER BY precio DESC LIMIT 1;
SELECT producto.nombre AS "producto", precio, fabricante.nombre AS "fabricante" FROM producto, fabricante WHERE codigo_fabricante = 2 AND fabricante.codigo = 2;
SELECT producto.nombre AS "producto", precio, fabricante.nombre AS "fabricante" FROM producto, fabricante WHERE codigo_fabricante = 6 AND fabricante.codigo = 6 AND precio > 200;
(SELECT producto.nombre AS "producto", precio, fabricante.nombre AS "fabricante" FROM producto, fabricante WHERE codigo_fabricante = 1 AND fabricante.codigo = 1) UNION (SELECT producto.nombre AS "producto", precio, fabricante.nombre AS "fabricante" FROM producto, fabricante WHERE codigo_fabricante = 3 AND fabricante.codigo = 3) UNION (SELECT producto.nombre AS "producto", precio, fabricante.nombre AS "fabricante" FROM producto, fabricante WHERE codigo_fabricante = 5 AND fabricante.codigo = 5);
SELECT producto.nombre AS "producto", precio, fabricante.nombre AS "fabricante" FROM producto, fabricante WHERE codigo_fabricante = fabricante.codigo AND codigo_fabricante IN (1, 3, 5);
SELECT producto.nombre AS "producto", precio, fabricante.nombre AS "fabricante" FROM producto, fabricante WHERE codigo_fabricante = fabricante.codigo AND SUBSTRING(fabricante.nombre, -1, 1) = "e";
SELECT producto.nombre AS "producto", precio, fabricante.nombre AS "fabricante" FROM producto, fabricante WHERE codigo_fabricante = fabricante.codigo AND LOCATE("w", fabricante.nombre);
SELECT producto.nombre AS "nombre del producto", precio, fabricante.nombre AS "nombre del fabricante" FROM producto, fabricante WHERE codigo_fabricante = fabricante.codigo AND precio > 180 ORDER BY precio DESC, "nombre del producto" ASC;
SELECT DISTINCT fabricante.codigo, fabricante.nombre FROM fabricante RIGHT JOIN producto ON fabricante.codigo = producto.codigo_fabricante WHERE fabricante.codigo = producto.codigo_fabricante;
SELECT fabricante.nombre AS "nombre del fabricante", producto.nombre AS "nombre del producto" FROM tienda.fabricante LEFT JOIN producto AS producto ON fabricante.codigo = producto.codigo_fabricante;
SELECT fabricante.*, producto.* FROM tienda.fabricante LEFT JOIN producto AS producto ON fabricante.codigo = producto.codigo_fabricante WHERE producto.nombre IS NULL;
SELECT producto.nombre AS "nombre del producto", fabricante.nombre AS "nombre del fabricante" FROM fabricante, producto WHERE producto.codigo_fabricante = fabricante.codigo AND fabricante.codigo = 2;
SELECT * FROM producto LEFT JOIN fabricante ON fabricante.codigo = producto.codigo_fabricante WHERE fabricante.codigo = 2 AND producto.precio = (SELECT MAX(producto.precio) FROM producto WHERE producto.codigo_fabricante = 2);
SELECT * FROM producto WHERE producto.precio = (SELECT MAX(producto.precio) FROM producto WHERE producto.codigo_fabricante = 2);
SELECT * FROM producto WHERE producto.precio = (SELECT MIN(producto.precio) FROM producto WHERE producto.codigo_fabricante = 3);
SELECT * FROM producto WHERE producto.precio >= (SELECT MAX(producto.precio) FROM producto WHERE producto.codigo_fabricante = 2);
SELECT * FROM producto WHERE producto.codigo_fabricante = 1 AND producto.precio >= (SELECT AVG(producto.precio) FROM producto WHERE producto.codigo_fabricante = 1); 

-- Consultas para la base de datos "universidad"
-- Visualizando diagrama Entidad-Relación
SELECT apellido1, apellido2, nombre FROM persona WHERE persona.tipo = "alumno" ORDER BY apellido1 ASC, apellido2 ASC, nombre ASC;
SELECT nombre, apellido1, apellido2, telefono FROM persona WHERE persona.tipo = "alumno" AND persona.telefono IS NULL;
SELECT nombre, apellido1, apellido2, fecha_nacimiento FROM persona WHERE persona.tipo = "alumno" AND persona.fecha_nacimiento LIKE '1999%';
SELECT nombre, apellido1, apellido2, nif, telefono FROM persona WHERE persona.tipo = "profesor"  AND persona.telefono IS NULL AND persona.nif LIKE "%K";
SELECT nombre, cuatrimestre, curso, id_grado FROM asignatura WHERE cuatrimestre = 1 AND curso = 3 AND id_grado = 7;
SELECT apellido1, apellido2, persona.nombre AS "profesor", departamento.nombre AS "departamento" FROM persona, departamento, profesor WHERE persona.tipo = "profesor" AND persona.id = profesor.id_profesor AND profesor.id_departamento = departamento.id ORDER BY apellido1 ASC, apellido2 ASC, "profesor" ASC;
SELECT persona.nif, persona.nombre, persona.apellido1, persona.apellido2, curso_escolar.anyo_inicio AS "año inicio", curso_escolar.anyo_fin AS "año finalización", asignatura.nombre AS "asignaturas" FROM curso_escolar, persona, alumno_se_matricula_asignatura, asignatura WHERE persona.nif = "26902806M" AND persona.id = alumno_se_matricula_asignatura.id_alumno AND curso_escolar.id = alumno_se_matricula_asignatura.id_curso_escolar AND asignatura.id = alumno_se_matricula_asignatura.id_asignatura;
SELECT DISTINCT departamento.nombre AS "departamento" /*, profesor.id_profesor AS "ID profesor", asignatura.nombre AS "asignatura", grado.nombre AS "nombre del grado"*/ FROM departamento, profesor, asignatura, grado WHERE departamento.id = profesor.id_departamento AND profesor.id_profesor = asignatura.id_profesor AND asignatura.id_grado = grado.id;
SELECT DISTINCT persona.* FROM persona, alumno_se_matricula_asignatura WHERE persona.tipo = "alumno" AND alumno_se_matricula_asignatura.id_curso_escolar = 5 AND alumno_se_matricula_asignatura.id_alumno = persona.id;

-- Consultas con LEFT JOIN y RIGHT JOIN
SELECT departamento.nombre AS "departamento", persona.apellido1, persona.apellido2, persona.nombre AS "profesor/a" FROM persona LEFT JOIN departamento ON departamento.id = persona.id ORDER BY departamento.id ASC, persona.apellido1 ASC, persona.apellido2 ASC, persona.nombre ASC;
SELECT departamento.nombre AS "departamento", CONCAT(persona.nombre, " ", persona.apellido1, " ", persona.apellido2) AS "profesor/a" FROM persona LEFT JOIN departamento ON departamento.id = persona.id WHERE departamento.id IS NULL;
SELECT departamento.nombre AS "departamento", profesor.id_profesor AS "ID profesor" FROM departamento LEFT JOIN profesor ON departamento.id = profesor.id_departamento WHERE profesor.id_profesor IS NULL;
SELECT CONCAT(persona.nombre, " ", persona.apellido1, " ", persona.apellido2) AS "profesor/a", asignatura.nombre AS "asignatura asociada" FROM persona LEFT JOIN asignatura ON persona.id = asignatura.id_profesor WHERE asignatura.id_profesor IS NULL AND persona.tipo = "profesor";
SELECT DISTINCT asignatura.nombre AS "asignatura", asignatura.id_profesor AS "profesor asignado" FROM asignatura RIGHT JOIN persona ON asignatura.id_profesor IS NULL WHERE persona.tipo = "profesor";
SELECT DISTINCT curso_escolar.*, asignatura.nombre AS "asignatura", profesor.*, departamento.nombre FROM curso_escolar LEFT JOIN asignatura ON curso_escolar.id = asignatura.curso LEFT JOIN profesor ON asignatura.id_profesor = profesor.id_profesor LEFT JOIN departamento ON departamento.id = profesor.id_departamento WHERE asignatura.id_profesor IS NULL;

-- Consultas resumen
SELECT COUNT(persona.id) AS "Número de alumnos" FROM persona WHERE persona.tipo = "alumno";
SELECT COUNT(persona.id) AS "Nacidos en 1999" FROM persona WHERE persona.tipo = "alumno" AND EXTRACT(YEAR FROM (persona.fecha_nacimiento)) = "1999";
SELECT departamento.nombre AS "Nombre del grado", COUNT(profesor.id_profesor) AS "Número de profesores/as" FROM departamento, profesor WHERE departamento.id = profesor.id_departamento GROUP BY departamento.nombre ORDER BY COUNT(profesor.id_profesor) DESC;
SELECT departamento.nombre AS "Nombre del departamento", COUNT(profesor.id_profesor) AS "Profesores" FROM departamento LEFT JOIN profesor ON departamento.id = profesor.id_departamento GROUP BY departamento.nombre ORDER BY COUNT(profesor.id_profesor) DESC; 
SELECT grado.nombre AS "Nombre del grado", COUNT(asignatura.id_grado) AS "Número de asignaturas" FROM grado LEFT JOIN asignatura ON asignatura.id_grado = grado.id GROUP BY grado.nombre ORDER BY COUNT(asignatura.id_grado) DESC;
SELECT grado.nombre AS "Nombre del grado", COUNT(asignatura.id_grado) AS "Número de asignaturas" FROM grado LEFT JOIN asignatura ON asignatura.id_grado = grado.id GROUP BY grado.nombre HAVING COUNT(asignatura.id_grado) >= 40 ORDER BY COUNT(asignatura.id_grado) DESC ;
SELECT DISTINCT grado.nombre AS "Nombre del grado", asignatura.tipo, SUM(asignatura.creditos) AS "Suma de créditos" FROM grado, asignatura WHERE grado.id = asignatura.id_grado GROUP BY asignatura.tipo, grado.nombre;
SELECT curso_escolar.anyo_inicio AS "Año inicio", COUNT(DISTINCT alumno_se_matricula_asignatura.id_alumno) AS "Número de alumnos" FROM curso_escolar, alumno_se_matricula_asignatura WHERE curso_escolar.id = alumno_se_matricula_asignatura.id_curso_escolar GROUP BY curso_escolar.anyo_inicio;
SELECT persona.id, persona.nombre, persona.apellido1, persona.apellido2, COUNT(asignatura.nombre) AS "Número de asignaturas" FROM persona LEFT JOIN asignatura ON persona.tipo = "profesor" AND asignatura.id_profesor = persona.id GROUP BY persona.id ORDER BY COUNT(asignatura.nombre) DESC;
SELECT * FROM persona WHERE persona.tipo = "alumno" ORDER BY persona.fecha_nacimiento DESC LIMIT 1;
SELECT DISTINCT persona.id AS "ID profesor", persona.nombre AS "profesor/a", departamento.nombre AS "departamento", asignatura.nombre AS "asignatura" FROM persona, profesor LEFT JOIN departamento ON departamento.id = profesor.id_departamento LEFT JOIN asignatura ON asignatura.id_profesor = profesor.id_profesor WHERE persona.tipo = "profesor" AND asignatura.id_profesor IS NULL AND profesor.id_profesor = persona.id;