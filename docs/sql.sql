SELECT 
tbl_curso_usuario.curso_id AS CURSO_USUARIO,
tbl_curso.curso_id AS ID_DEL_CURSO,
tbl_curso.curso_name AS NOMBRE_CURSO,
tbl_curso.curso_descripcion AS DESCRIPCION,
tbl_curso.curso_fecha_inicial AS FECHA_INICIAL,
tbl_curso.curso_fecha_final AS FECHA_FINAL,
tbl_usuario.usuario_id AS ID_USUARIO,
CONCAT( tbl_usuario.usuario_name," ", tbl_usuario.usuario_ap," ", tbl_usuario.usuario_am)  AS NOMBRE_USUARIO,
tbl_instructor.instructor_name AS NOMBRE_INSTRUCTOR
FROM `tbl_curso_usuario` 
INNER JOIN tbl_curso ON tbl_curso_usuario.curso_id = tbl_curso.curso_id
INNER JOIN tbl_usuario ON tbl_curso_usuario.usuario_id = tbl_usuario.usuario_id
INNER JOIN tbl_instructor ON tbl_curso.curso_id = tbl_instructor.instructor_id
WHERE tbl_curso_usuario.usuario_id = 1;


/** SEGUNDO CODIGO **/

SELECT 
tbl_curso_usuario.curso_usuario_id AS ID_CURSO_USUARIO,
tbl_curso.curso_id AS ID_DEL_CURSO,
tbl_curso.curso_name AS NOMBRE_DEL_CURSO,
tbl_curso.curso_descripcion AS DESCRIPCION_DEL_CURSO,
tbl_curso.curso_fecha_inicial AS FECHA_INICIAL,
tbl_curso.curso_fecha_final AS FECHA_FINAL,
tbl_usuario.usuario_id AS ID_USUARIO,
CONCAT( tbl_usuario.usuario_name," ", tbl_usuario.usuario_ap," ", tbl_usuario.usuario_am)  AS NOMBRE_USUARIO,
CONCAT( tbl_instructor.instructor_name, " ", tbl_instructor.instructor_ap ) AS NOMBRE_INSTRUCTOR
 

FROM `tbl_curso_usuario`
INNER JOIN tbl_curso ON tbl_curso_usuario.curso_id = tbl_curso.curso_id
INNER JOIN tbl_usuario ON tbl_curso_usuario.usuario_id = tbl_usuario.usuario_id
INNER JOIN tbl_instructor ON tbl_curso.curso_id = tbl_instructor.instructor_id
WHERE tbl_curso_usuario.usuario_id = 1;

-- Contar registros
SELECT COUNT(*) FROM `tbl_curso_usuario` WHERE usuario_id = 2;

-- Consulta para mostrar todos los cursos de una persona y su categoría
SELECT 
CONCAT(tbl_usuario.usuario_name," ",tbl_usuario.usuario_ap," ",tbl_usuario.usuario_am) AS "NOMBRE DEL USUARIO",
tbl_curso.curso_name AS "NOMBRE DEL CURSO" ,
tbl_categoria.categoria_nombre AS "CATEGORÍA A LA QUE PERTENECE"
FROM `tbl_curso_usuario` 
INNER JOIN tbl_curso ON tbl_curso_usuario.curso_id = tbl_curso.curso_id
INNER JOIN tbl_categoria on tbl_categoria.categoria_id = tbl_curso.curso_categoria_id
INNER JOIN tbl_usuario on tbl_usuario.usuario_id = tbl_curso_usuario.usuario_id
WHERE tbl_curso_usuario.usuario_id = 1;

/** CONSULTA PARA ACTUALIZAR UN USUARIO **/
UPDATE `tbl_usuario` 
SET usuario_name = "ssA",
    usuario_ap = "ssA",
    usuario_am = "ssA",
    -- usuario_curp = ?,
    -- usuario_rfc = ?,
    usuario_genero = "Mujer",
    usuario_rol = "2",
    usuario_telefono = "3333333333",
    usuario_email = "ssA@yahoo.com",
    usuario_npersonal = "123456",
    usuario_pwd = "123456",
    usuario_nivel = "EDUCACIÓN ESPECIAL",
    -- usuario_region = ?,
    -- usuario_delegacion = ?,
    -- usuario_folio = ?,
    usuario_fecha = CURRENT_DATE,
    -- usuario_tituloConstancia = ?,
    -- usuario_observacion = ?,
    usuario_fechaCracion = CURRENT_DATE,
    usuario_status = "1"
WHERE usuario_id = 6;