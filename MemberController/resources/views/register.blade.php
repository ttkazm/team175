@extends('layouts.app')

@section('content')

<!--値を渡す-->
        <form action="/memberRegister" class="form-text" method="post" >
@csrf
        <input type="text" name="name" value="name">
        <button type="submit">登録</button>
        </form>
        
        <?php 
             print_r($_POST);
        
        ?>
    
