<?php
/* 后台首页 */
Route::get('index/', [
    'as'   => 'backend.index.index',
    'uses' => 'IndexController@index',
]);

/* 用户管理模块 */
Route::get('user/search', [
    'as'         => 'backend.user.search',
    'uses'       => 'UserController@search',
    'middleware' => ['search'],
]);

Route::resource("user", 'UserController');
Route::get('user/profile/{id}', [
    'as'   => 'backend.user.profile',
    'uses' => 'UserController@profile',
]);
Route::post('user/update-profile', [
    'as'   => 'backend.user.update-profile',
    'uses' => 'UserController@updateProfile',
]);
Route::post('user/upload-avatar', [
    'as'   => 'backend.user.upload-avatar',
    'uses' => 'UserController@uploadAvatar',
]);

/* 部门管理模块 */
Route::resource("depart", 'DepartController');


/* 角色管理模块 */
Route::get('role/permission/{id}', [
    'as'   => 'backend.role.permission',
    'uses' => 'RoleController@permission',
]);
Route::post('role/associatePermission', [
    'as'   => 'backend.role.associate.permission',
    'uses' => 'RoleController@associatePermission',
]);
Route::get('role/datarule/{id}', [
    'as'   => 'backend.role.datarule',
    'uses' => 'RoleController@datarule',
]);
Route::post('role/associateDatarule', [
    'as'   => 'backend.role.associate.datarule',
    'uses' => 'RoleController@associateDatarule',
]);
Route::resource("role", 'RoleController');

/* 权限管理模块 */
Route::get('permission/associate/{id}', [
    'as'   => 'backend.permission.associate',
    'uses' => 'PermissionController@associate',
]);
Route::post('permission/associateMenus', [
    'as'   => 'backend.permission.associate.menus',
    'uses' => 'PermissionController@associateMenus',
]);
Route::post('permission/associateActions', [
    'as'   => 'backend.permission.associate.actions',
    'uses' => 'PermissionController@associateActions',
]);
Route::resource("permission", 'PermissionController');

/* 操作管理模块 */
/*Route::resource('action', 'ActionController');*/

/* 文件管理模块 */
Route::get('file', [
    'as'   => 'backend.file.index',
    'uses' => 'FileController@index',
]);
Route::post('file/upload', [
    'as'   => 'backend.file.upload',
    'uses' => 'FileController@upload',
]);
Route::get('file/download/{id}', [
    'as'   => 'backend.file.download',
    'uses' => 'FileController@download',
]);
Route::delete('file/destroy/{id}', [
    'as'   => 'backend.file.destroy',
    'uses' => 'FileController@destroy',
]);

/* 发送测试文字邮件 */
Route::get('email/send/{id}', [
    'as'   => 'backend.email.send',
    'uses' => 'EmailController@send',
]);

/* 发送测试图文邮件 */
Route::get('email/sendPicture/{id}', [
    'as'   => 'backend.email.sendPicture',
    'uses' => 'EmailController@sendPicture',
]);

/* 发送测试附件邮件 */
Route::get('email/sendFile/{id}', [
    'as'   => 'backend.email.sendFile',
    'uses' => 'EmailController@sendFile',
]);