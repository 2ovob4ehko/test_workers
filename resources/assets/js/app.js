$(document).ready(function(){
    /*hierarhy list events*/
    $(".hierarchy_item").on("click",function(e){
        e.stopPropagation();
        loadSubWokers($(this),$(this).attr("data-id"));
    });
    $(".hierarchy_item").on("click",".hierarchy_item",function(e){
        e.stopPropagation();
        loadSubWokers($(this),$(this).attr("data-id"));
    });
    /*edit photo event*/
    $("#photo_file").change(function(){
        readURL(this);
    });
    /*hierarhy list sortable init*/
    $('.itemsList').sortable({
        connectWith: $('.itemsList'),
        placeholder: "ui-state-highlight",
        receive:function(event, ui){
            let chief_id = $(ui.item).parent().parent().attr("data-id");
            let worker_id = $(ui.item).attr("data-id");
            $.post('/update_chief',
            {
                '_token': $('meta[name=csrf-token]').attr('content'),
                'id': worker_id,
                'chief_id': chief_id
            });
        }
    });
});
/*loading subwokers by chief id to hierarhy list*/
function loadSubWokers(el,chief){
    $.get("hierarchy/"+chief,function(data){
        var result= '';
        data.forEach(function(item,i,arr){
            result +='<li data-id="'+item.id+'" class="hierarchy_item">'
                +item.name+' - '+item.position+'<ul  class="itemsList"></ul>'
            +'</li>';
        });
        el.children("ul").html(result);
        /*hierarhy list sortable init*/
        $('.itemsList').sortable({
            connectWith: $('.itemsList'),
            placeholder: "ui-state-highlight",
            receive:function(event, ui){
                let chief_id = $(ui.item).parent().parent().attr("data-id");
                let worker_id = $(ui.item).attr("data-id");
                $.post('/update_chief',
                {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    'id': worker_id,
                    'chief_id': chief_id
                });
            }
        });
    });
}
/*show image file to load*/
function readURL(input){
    if (input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $("#preview").css('background-image', 'url(' + e.target.result + ')');
         }
        reader.readAsDataURL(input.files[0]);
    }
}
/*angular getting data for admin table*/
angular.module('sortTable',[],function($interpolateProvider){
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }).controller('mainController',function($scope,$http){
        $scope.sortType     = 'id'; // set the default sort type
        $scope.sortReverse  = false;  // set the default sort order
        $scope.searchFish   = '';     // set the default search/filter term

        // get workers list
        $http.get("workers")
            .then(function (response) {$scope.workers = response.data;});
});

