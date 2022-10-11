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

