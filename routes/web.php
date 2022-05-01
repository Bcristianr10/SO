<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\loginController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\baseDatosController;
use App\Http\Controllers\estadosController;
use App\Http\Controllers\mensajesController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ayudasController;
use App\Http\Controllers\imagenesController;
use App\Http\Controllers\idiomaController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\emprendimientoController;
use App\Http\Controllers\donacionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('/aboutUs', [Controller::class, 'aboutUs'])->name('about');
Route::get('/contact', [Controller::class, 'contact'])->name('contact');
Route::get('/inicio', [Controller::class, 'inicio'])->name('inicio');
Route::get('/login', [loginController::class, 'index'])->name('login.index');
Route::Post('/login', [loginController::class, 'login'])->name('login.login');
Route::get('/cambiarContrasena', [loginController::class, 'cambiarContrasena'])->name('login.cambiarContrasena');
Route::Post('/login/cambiar', [loginController::class, 'cambiarContrasenaSave'])->name('login.cambiarContrasena.save');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');

//USUARIOS
Route::get('/usuarios', [usuarioController::class, 'index'])->name('usuario.index');
Route::post('/usuarios', [usuarioController::class, 'insert'])->name('usuario.insert');
Route::get('/usuarioCreate', [usuarioController::class, 'create'])->name('usuario.create');
Route::post('/usuarios/save', [usuarioController::class, 'save'])->name('usuario.save');
Route::get('/usuarios/lock/{id}', [usuarioController::class, 'lock'])->name('usuario.delete');
Route::get('/usuarios/unlock/{id}', [usuarioController::class, 'unlock'])->name('usuario.unlock');
Route::post('/cambiar/imagen/perfilU', [usuarioController::class, 'cambiarImagenPerfil'])->name('cambiar.imagen.perfilU');



//BASE DE DATOS
Route::get('/adultos', [baseDatosController::class, 'indexAdultos'])->name('adultos.index');
Route::get('/niños', [baseDatosController::class, 'indexHijos'])->name('hijos.index');
Route::get('/bloqueados/adultos', [baseDatosController::class, 'indexBloqueadosAdultos'])->name('bloqueados.adultos.index');
Route::get('/bloqueados/niños', [baseDatosController::class, 'indexBloqueadosHijos'])->name('bloqueados.hijos.index');
Route::get('/perfilAdulto/{id}', [baseDatosController::class, 'perfilAdulto'])->name('perfil.adulto');
Route::get('/perfilHijo/{id}', [baseDatosController::class, 'perfilHijo'])->name('perfil.hijo');
Route::get('/ver/perfilHijo/{id}', [baseDatosController::class, 'verPerfilHijo'])->name('ver.notificacion.hijo');
Route::get('/ver/perfilPadre/{id}', [baseDatosController::class, 'verPerfilPadre'])->name('ver.notificacion.padre');
Route::post('/perfilFamilia', [baseDatosController::class, 'perfilFamilia'])->name('familia.perfil');

Route::post('/asignar/familia', [baseDatosController::class, 'asignarFamilia'])->name('asignar.familia');
Route::post('/asignar/esposo', [baseDatosController::class, 'asignarEsposo'])->name('asignar.esposo');
Route::post('/asignar/esposa', [baseDatosController::class, 'asignarEsposa'])->name('asignar.esposa');
Route::post('/agregar/archivo', [baseDatosController::class, 'guardarArchivo'])->name('agregar.archivo');
Route::post('/agregar/seguimiento', [baseDatosController::class, 'guardarSeguimiento'])->name('agregar.seguimiento');
Route::get('/crearPerfil', [baseDatosController::class, 'crearPerfil'])->name('crear.padre');

Route::post('/editar/contacto/padre', [baseDatosController::class, 'editarContactoPadre'])->name('editar.contacto.padre');
Route::post('/editar/informacion/padre', [baseDatosController::class, 'editarInformacionPadre'])->name('editar.informacion.padre');
Route::post('/editar/informacion/hijo', [baseDatosController::class, 'editarInformacionHijo'])->name('editar.informacion.hijo');
Route::post('/cambiar/imagen/perfil', [baseDatosController::class, 'cambiarImagenPerfilP'])->name('cambiar.imagen.perfil');
Route::post('/cambiar/nombre/perfil', [baseDatosController::class, 'cambiarNombrePerfil'])->name('cambiar.nombre.perfil');
Route::get('/adultos/prueba', [Controller::class, 'index']);

Route::get('/adultos/crear', [baseDatosController::class, 'crearPerfilAdulto'])->name('crear.perfil.adulto');

Route::get('/adultosPendientes', [baseDatosController::class, 'indexAdultosPendientes'])->name('adultos.pendientes.index');
Route::get('/niñosPendientes', [baseDatosController::class, 'indexNiñosPendientes'])->name('niños.pendientes.index');
Route::get('/activar/perfilAdulto/{id}', [baseDatosController::class, 'activarPerfilAdulto'])->name('activar.perfilAdulto');
Route::get('/eliminar/perfilAdulto/{id}', [baseDatosController::class, 'eliminarPerfilAdulto'])->name('eliminar.perfilAdulto');
Route::get('/bloquear/perfilAdulto/{id}', [baseDatosController::class, 'bloquearPerfilAdulto'])->name('bloquear.perfilAdulto');
Route::get('/activar/perfilHijo/{id}', [baseDatosController::class, 'activarPerfilHijo'])->name('activar.perfilHijo');
// Route::get('/eliminar/perfilHijo/{id}', [baseDatosController::class, 'eliminarPerfilHijo'])->name('eliminar.perfilHijo');



Route::get('/estados', [estadosController::class, 'index'])->name('estado.index');
Route::POST('/estado/insert', [estadosController::class, 'insert'])->name('estado.insert');
Route::POST('/estado/save', [estadosController::class, 'save'])->name('estado.save');
Route::get('/eliminar/estado/{id}', [estadosController::class, 'eliminar'])->name('eliminar.estado');



Route::post('/perfilAdulto', [baseDatosController::class, 'perfilAdulto'])->name('baseDatos.perfil');
Route::post('/perfilHijo', [baseDatosController::class, 'perfilHijo'])->name('baseDatos.perfil.hijo');

Route::get('/registrate/hijo', [Controller::class, 'formHijo'])->name('formhijo');
Route::post('/hijo', [Controller::class, 'insertHijo'])->name("form.insertHijo") ;
Route::get('/hijo/{id}', [Controller::class, 'noPasaporteHijo'])->name('noPasaporte');

Route::get('/registrate', [Controller::class, 'form'])->name('form');
Route::get('/form/{id}', [Controller::class, 'distrito'])->name('distrito');
Route::get('/formu/{id}', [Controller::class, 'corregimiento'])->name('corregimiento');
Route::post('/form', [Controller::class, 'insert'])->name("form.insert") ;
Route::get('/for/{id}', [Controller::class, 'noPasaporte'])->name('noPasaporte');
Route::get('/gracias', [Controller::class, 'gracias'])->name('gracias');


Route::get('/distritos/{id}', [Controller::class, 'distrito'])->name('distritos');
Route::get('/corregimientos/{id}', [Controller::class, 'corregimiento'])->name('corregimientos');

Route::post('/mensaje/save', [Controller::class, 'mensajeSave'])->name("mensaje.save") ;

Route::get('/mensajes', [mensajesController::class, 'index'])->name('mensaje.index');
Route::get('/mensajes/leido/{id}', [mensajesController::class, 'leido'])->name('mensaje.marcar.leido');
Route::get('/mensajes/eliminar/{id}', [mensajesController::class, 'eliminar'])->name('mensaje.eliminar');

Route::post('/editar/contacto/hijo', [baseDatosController::class, 'editarContactoHijo'])->name('editar.contacto.hijo');
Route::post('/agregar/archivo/hijo', [baseDatosController::class, 'guardarArchivoHijo'])->name('agregar.archivo.hijo');
Route::get('/eliminar/perfilHijo/{id}', [baseDatosController::class, 'eliminarPerfilHijo'])->name('eliminar.perfilHijo');
Route::post('/asignar/padre', [baseDatosController::class, 'asignarPadre'])->name('asignar.padre');
Route::post('/asignar/madre', [baseDatosController::class, 'asignarMadre'])->name('asignar.madre');


Route::get('/graficas', [dashboardController::class, 'index'])->name('dashboard.index');
Route::get('/graficas/paises', [dashboardController::class, 'paises'])->name('dashboard.paises');

Route::get('/eliminar/notificaciones', [usuarioController::class, 'eliminarNotificaciones'])->name('eliminar.todas.notificaciones');


Route::get('/ayudas', [ayudasController::class, 'index'])->name('ayudas.index');
Route::post('/ayudas', [ayudasController::class, 'insert'])->name('ayuda.insert');
Route::get('/ayudas/edit/{id}', [ayudasController::class, 'editar'])->name('ayuda.editar');
Route::get('/ayudas/delete/{id}', [ayudasController::class, 'eliminar'])->name('ayuda.eliminar');
Route::post('/ayudas/edit', [ayudasController::class, 'save'])->name('ayuda.save');

Route::get('/ayudas/tipo/{id}', [ayudasController::class, 'tipo'])->name('ayudas.xTipo');


Route::get('/correo/prueba/{id}', [Controller::class, 'enviarCorreo'])->name('correo.prueba');


Route::get('/imagenes', [imagenesController::class, 'index'])->name('imagenes.index');
Route::get('/imagen/create', [imagenesController::class, 'create'])->name('imagen.create');
Route::post('/imagen/create', [imagenesController::class, 'insert'])->name('imagen.insert');
Route::post('/imagen/save', [imagenesController::class, 'save'])->name('imagen.save');



Route::get('/idioma/{id}', [idiomaController::class, 'idioma'])->name('idioma.idioma');

Route::get('/idiomas', [idiomaController::class, 'index'])->name('idioma.index');

Route::post('/texto/insert', [idiomaController::class, 'insert'])->name('texto.insert');
Route::post('/texto/save', [idiomaController::class, 'save'])->name('texto.save');
Route::get('/texto/delete/{id}', [idiomaController::class, 'delete'])->name('texto.delete');


Route::get('/actividades', [blogController::class, 'index'])->name('blog.index');
Route::get('/actividades/{id}', [blogController::class, 'detalle'])->name('blog.detalle');


Route::get('/emprendimiento', [emprendimientoController::class, 'indexEmprendimineto'])->name('emprendimiento.index');
Route::get('/emprendimientos', [emprendimientoController::class, 'index'])->name('emprendimientos.index');
Route::get('/emprendimientos/create', [emprendimientoController::class, 'create'])->name('emprendimientos.create');
Route::post('/emprendimientos/create', [emprendimientoController::class, 'insert'])->name('emprendimientos.insert');
Route::post('/emprendimientos/save', [emprendimientoController::class, 'save'])->name('emprendimientos.save');
Route::get('/emprendimientos/{id}', [emprendimientoController::class, 'delete'])->name('emprendimientos.eliminar');
Route::get('/emprendimientos/update/{id}', [emprendimientoController::class, 'update'])->name('emprendimientos.update');


Route::get('/donacion', [donacionController::class, 'indexDonacion'])->name('donacion.index');
Route::get('/donaciones', [donacionController::class, 'index'])->name('donaciones.index');
Route::get('/donaciones/create', [donacionController::class, 'create'])->name('donaciones.create');
Route::post('/donaciones/create', [donacionController::class, 'insert'])->name('donaciones.insert');
Route::post('/donaciones/save', [donacionController::class, 'save'])->name('donaciones.save');
Route::get('/donaciones/{id}', [donacionController::class, 'delete'])->name('donaciones.eliminar');
Route::get('/donaciones/update/{id}', [donacionController::class, 'update'])->name('donaciones.update');

Route::get('/blog', [blogController::class, 'indexBlog'])->name('adminBlog.index');
Route::get('/blog/create', [blogController::class, 'create'])->name('adminBlog.create');
Route::post('/blog/create', [blogController::class, 'insert'])->name('adminBlog.insert');
Route::post('/blog/save', [blogController::class, 'save'])->name('adminBlog.save');
Route::get('/blog/update/{id}', [blogController::class, 'update'])->name('adminBlog.update');
Route::get('/blog/{id}/{idB}', [blogController::class, 'deleteImage'])->name('adminBlogImage.eliminar');
Route::get('/blog/{id}', [blogController::class, 'delete'])->name('adminBlog.delete');












