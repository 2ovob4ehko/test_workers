@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <ul class="itemsList">{{ hierarhyList($workers) }}</ul>
    </div>
@endsection

<?php
    function hierarhyList($array,$chief_id=null,$level=0){
        foreach($array as $worker){
            if($worker->chief == $chief_id){
                echo '<li data-id="'.$worker->id.'" class="hierarchy_item">
                '.$worker->name.' - '.$worker->position;
                    $level++;
                    echo '<ul class="itemsList">';
                        if($level<2){
                            hierarhyList($array,$worker->id,$level);
                        }
                    echo '</ul>';
                    $level--;
                echo '</li>';
            }
        }
    }
?>