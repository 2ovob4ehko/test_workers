@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <div class="container" ng-app="sortTable" ng-controller="mainController">
            <a href="/create" class="btn btn-success" style="margin-bottom:15px;">Add new worker</a>
            <form>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
                        <input type="text" class="form-control" placeholder="Search" ng-model="searchWokers">
                    </div>
                </div>
            </form>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="">
                        <th class="col-xs-1">
                            <a href="#" ng-click="sortType = 'id'; sortReverse = !sortReverse">
                                ID
                                <span ng-show="sortType == 'id' && !sortReverse" class="glyphicon glyphicon-triangle-bottom"></span>
                                <span ng-show="sortType == 'id' && sortReverse" class="glyphicon glyphicon-triangle-top"></span>
                            </a>
                        </th>
                        <th class="col-xs-3">
                            <a href="#" ng-click="sortType = 'name'; sortReverse = !sortReverse">
                                Name
                                <span ng-show="sortType == 'name' && !sortReverse" class="glyphicon glyphicon-triangle-bottom"></span>
                                <span ng-show="sortType == 'name' && sortReverse" class="glyphicon glyphicon-triangle-top"></span>
                            </a>
                        </th>
                        <th class="col-xs-3">
                            <a href="#" ng-click="sortType = 'position'; sortReverse = !sortReverse">
                                Position
                                <span ng-show="sortType == 'position' && !sortReverse" class="glyphicon glyphicon-triangle-bottom"></span>
                                <span ng-show="sortType == 'position' && sortReverse" class="glyphicon glyphicon-triangle-top"></span>
                            </a>
                        </th>
                        <th class="col-xs-1">
                            <a href="#" ng-click="sortType = 'recruited'; sortReverse = !sortReverse">
                                Recruited
                                <span ng-show="sortType == 'recruited' && !sortReverse" class="glyphicon glyphicon-triangle-bottom"></span>
                                <span ng-show="sortType == 'recruited' && sortReverse" class="glyphicon glyphicon-triangle-top"></span>
                            </a>
                        </th>
                        <th class="col-xs-1">
                            <a href="#" ng-click="sortType = 'salary'; sortReverse = !sortReverse">
                                Salary
                                <span ng-show="sortType == 'salary' && !sortReverse" class="glyphicon glyphicon-triangle-bottom"></span>
                                <span ng-show="sortType == 'salary' && sortReverse" class="glyphicon glyphicon-triangle-top"></span>
                            </a>
                        </th>
                        <th class="col-xs-1">Photo</th>
                        <th class="col-xs-1">
                            <a href="#" ng-click="sortType = 'chief'; sortReverse = !sortReverse">
                                Chief
                                <span ng-show="sortType == 'chief' && !sortReverse" class="glyphicon glyphicon-triangle-bottom"></span>
                                <span ng-show="sortType == 'chief' && sortReverse" class="glyphicon glyphicon-triangle-top"></span>
                            </a>
                        </th>
                        <th class="col-xs-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="" ng-repeat="worker in workers | orderBy:sortType:sortReverse | filter:searchWokers">
                        <th scope="row" class="col-xs-1"><% worker.id %></th>
                        <td><% worker.name %></td>
                        <td><% worker.position %></td>
                        <td><% worker.recruited | date:'MM.dd.yyyy' %></td>
                        <td><% worker.salary %></td>
                        <td><div ng-show="worker.thumb != null"><img class="img-rounded small_image" ng-src="<% worker.thumb %>" /></div></td>
                        <td><% worker.chief %></td>
                        <td><a href="/edit/<% worker.id %>" class="btn btn-success glyphicon glyphicon-pencil"></a></td>
                    </tr>
                </tbody>
            </table>
        <div>
    </div>
@endsection