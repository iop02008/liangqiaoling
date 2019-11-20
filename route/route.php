<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//前台路由
Route::rule('cate/:id','index/index/index','get');
Route::rule('/','index/index/index','get');
Route::rule('article-Public<id>','index/article/info','get');
Route::rule('register','index/index/register','get|post');
Route::rule('login','index/index/login','post');
Route::rule('outlogin','index/index/out','post');
Route::rule('search','index/index/search','get');
Route::rule('comment','index/article/comm','post');
Route::rule('whisper','index/whisper/whisper','get');
Route::rule('speek','index/whisper/speek','post');
Route::rule('message','index/message/message','get');
Route::rule('messagespeek','index/message/speek','post');
Route::rule("album",'index/album/index','get');
Route::rule('about','index/about/index','get');


//后台路由
Route::group('admin',function(){
	Route::rule('/','admin/index/login','get|post');	
	Route::rule('register','admin/index/register','get|post');
	Route::rule('forget','admin/index/forget','get|post');
	Route::rule('resetPassword','admin/index/resetPassword','post');
	Route::rule('index','admin/home/index','get');
	Route::rule('welcome','admin/home/welcome','get');
	Route::rule('outLogin','admin/home/outLogin','post');
	Route::rule('catelist','admin/cate/list','get');
	Route::rule('cateadd','admin/cate/add','get|post');
	Route::rule('catesort','admin/cate/sort','post');
	Route::rule('cateedit/[:id]','admin/cate/edit','get|post');
	Route::rule('cateedit','admin/cate/del','post');
	Route::rule('articlelist','admin/article/list','get');
	Route::rule('articleadd','admin/article/add','get|post');
	Route::rule('articletop','admin/article/top','post');
	Route::rule('articleedit/[:id]','admin/article/edit','get|post');
	Route::rule('articledel','admin/article/del','post');
	Route::rule('articleupload','admin/article/upload','post');
	Route::rule('memberlist','admin/member/all','get');
	Route::rule('memberadd','admin/member/add','get|post');
	Route::rule('memberedit/[:id]','admin/member/edit','get|post');
	Route::rule('memberdel','admin/member/del','post');
	Route::rule('adminlist','admin/admin/all','get');
	Route::rule('adminadd','admin/admin/add','get|post');
	Route::rule('adminedit/[:id]','admin/admin/edit','get|post');
	Route::rule('adminswitch','admin/admin/adminSwitch','post');
	Route::rule('admindel','admin/admin/del','post');
	Route::rule('comment','admin/comment/all','get');
	Route::rule('commentdel','admin/comment/del','post');
	Route::rule('set','admin/system/set','get|post');
	Route::rule('whisperall','admin/whisper/all','get');
	Route::rule('whisperdel','admin/whisper/del','post');
	Route::rule('whisperadd','admin/whisper/add','get|post');
	Route::rule('whisperupload','admin/whisper/upload','post');
	Route::rule('whisperedit/[:id]','admin/whisper/edit','get|post');
	Route::rule('whispercom','admin/whispercom/all','get');
	Route::rule('whispercomdel','admin/whispercom/del','post');
	Route::rule('message','admin/message/all','get');
	Route::rule('messagedel','admin/message/del','post');
	Route::rule('albumall','admin/album/all','get');
	Route::rule('albumadd','admin/album/add','get');
	Route::rule('albumupload','admin/album/upload','post');
	Route::rule('albumuploadone','admin/album/uploadone','post');
	Route::rule('albumdel','admin/album/del','post');
	Route::rule('albumedit/[:id]','admin/album/edit','get|post');
});




