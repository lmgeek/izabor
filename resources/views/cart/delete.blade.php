<?php
/**
 * Created by PhpStorm.
 * User: lamnav
 * Date: 9/9/2018
 * Time: 04:42
 */
?>

{{ Form::open(['route' => ['delete.destroy', $c->id], 'method' => 'delete']) }}
{{ Form::submit('Quitar', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}
