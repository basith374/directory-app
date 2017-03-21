@extends('admin.layout')

@section('head')
<link href="/css/miller.css" rel="stylesheet">
@endsection

@section('content')

    <section class="content-header">
      <h1>
        Cities
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cities table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<div id="miller_column"></div>
            </div>
          </div>

        </div>
      </div>
    </section>

@endsection

@section('scripts')
<script src="/js/miller.js"></script>
<script>
	function Category() {

    var _this = this;

    _this.categoryId = guid();

    _this.setCategoryId = function (categoryId) {

        _this.categoryId = categoryId;

    };

    _this.getCategoryId = function () {
        return _this.categoryId;
    };


    _this.setCategoryName = function (categoryName) {

        _this.categoryName = categoryName;

    };
    _this.getCategoryName = function () {
        return _this.categoryName;
    };


    _this.setParentId = function (parentId) {

        _this.parentId = parentId;

    };
    _this.getParentId = function () {
        return _this.parentId;
    };


    _this.setIsLowestLevel = function (isLowestLevel) {
        _this.isLowestLevel = isLowestLevel;
    };
    _this.getIsLowestLevel = function () {
        return _this.isLowestLevel
    };

    _this.setItems = function (categoryItems) {
        _this.items = categoryItems;
    };
    _this.getItems = function () {
        return _this.items
    }


}

function CategoryItem() {

    var _this = this;

    _this.itemId = guid();

    _this.setItemId = function (itemId) {

        _this.itemId = itemId;

    };

    _this.getItemId = function () {
        return _this.itemId;
    };


    _this.setItemName = function (itemName) {

        _this.itemName = itemName;

    };
    _this.getItemName = function () {
        return _this.itemName;
    };


    _this.setItemIcon = function (itemIcon) {

        _this.itemIcon = itemIcon;

    };
    _this.getItemIcon = function () {
        return _this.itemIcon;
    };


    _this.setParentId = function (parentId) {

        _this.parentId = parentId;

    };
    _this.getParentId = function () {
        return _this.parentId;
    };


    _this.setCategoryId = function (categoryId) {

        _this.categoryId = categoryId;

    };
    _this.getCategoryId = function () {
        return _this.categoryId;
    };


    _this.setHasChildren = function (hasChildren) {
        _this.hasChildren = hasChildren;
    };
    _this.getHasChildren = function () {
        return _this.hasChildren
    };

    _this.setNumChildren = function(numChildren) {
        _this.numChildren = numChildren;
        _this.setHasChildren(numChildren != 0);
    }
    
    _this.getNumChildren = function(){
        return _this.numChildren;
    };

    _this.isDeletable = true;
    _this.setIsDeletable = function (isDeletable) {
        _this.isDeletable = isDeletable;
    };
    _this.getIsDeletable = function () {
        return _this.isDeletable
    };


}

var data = {
	   "categoryId":"63ef58e5-fc92-9934-9b4c-ca5f457a425b",
	   "categoryName":"Category 2",
	   "parentId":"53732c02-f3d3-10de-1710-c74a8e3df260",
	   "isLowestLevel":false,
	   "items":[
	      {
		 "itemId":"50b73f3a-a302-14dc-e61c-3da72876e712",
		 "isDeleteable":true,
		 "itemName":"Category 2 item 1",
		 "hasChildren":false,
		 "categoryId":"63ef58e5-fc92-9934-9b4c-ca5f457a425b",
		 "parentId":"d39e098e-5ecb-3ba5-8fd8-fa20c7685e8c",
	      },
	      {
		 "itemId":"d98c4bfc-cae5-3355-08b8-84d0bc4edd59",
		 "isDeleteable":true,
		 "itemName":"Category 2 item 2",
		 "hasChildren":true,
		 "categoryId":"63ef58e5-fc92-9934-9b4c-ca5f457a425b",
		 "parentId":"d39e098e-5ecb-3ba5-8fd8-fa20c7685e8c",
	      },
	      {
		 "itemId":"50603731-b62e-d0d2-dda8-493e9882651f",
		 "isDeleteable":true,
		 "itemName":"Category 2 item 3",
		 "hasChildren":true,
		 "categoryId":"63ef58e5-fc92-9934-9b4c-ca5f457a425b",
		 "parentId":"d39e098e-5ecb-3ba5-8fd8-fa20c7685e8c"
	      },
	      {
		 "itemId":"72942b44-d011-1530-26b0-aa7f3351209e",
		 "isDeleteable":true,
		 "itemName":"Category 2 item 4",
		 "hasChildren":true,
		 "categoryId":"63ef58e5-fc92-9934-9b4c-ca5f457a425b",
		 "parentId":"d39e098e-5ecb-3ba5-8fd8-fa20c7685e8c"
	      },
	      {
		 "itemId":"34644c0c-56f2-dc59-a649-2ea8d7195e97",
		 "isDeleteable":true,
		 "itemName":"Category 2 item 5",
		 "hasChildren":false,
		 "categoryId":"63ef58e5-fc92-9934-9b4c-ca5f457a425b",
		 "parentId":"d39e098e-5ecb-3ba5-8fd8-fa20c7685e8c"
	      }
	   ]
	}


	$millerCol = $("#miller_column")
	$millerCol.millerColumn();
	 // $millerCol.on("item-selected", ".miller-col-list-item", function (event, data) {
	 // });
	 $.ajax({
	 	url: '/admin/cities',
	 	method: 'GET',
	 	success: function(rsp) {
	 		console.log(rsp)
	 	}
	 })
</script>
@endsection