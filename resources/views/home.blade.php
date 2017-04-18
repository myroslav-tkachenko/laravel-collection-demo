<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            [v-cloak] { display: none }
        </style>
    </head>
    <body>

    <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    @if (auth()->check())
                        {{ auth()->user()->name }}
                    @else
                        <a href="/login">Not Logged</a>
                    @endif <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-static-top/">Static top</a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

        <div class="container" id="rest-client" v-cloak>
            <h1 class="text-center">@{{ message }}</h1>

            
            <div class="panel panel-info" v-for="item in items">
                  <div class="panel-heading">
                        <h3 class="panel-title">
                            @{{ item.title }}
                            <a href="#!" class="pull-right" v-on:click="deleteItem(item)">
                                X
                            </a>
                            <a href="#!" class="pull-right" v-on:click="editItem(item)">
                                Edit&nbsp;
                            </a>
                        </h3>
                  </div>
                  <div class="panel-body">
                      <a v-bind:href="item.link" target="_blank">@{{ item.link }}</a>
                      
                      <div class="panel panel-default" v-if="showEditForm(item)">
                          <div class="panel-body">

                            <form action="/items" method="POST" class="form-horizontal" role="form" v-on:submit.prevent="putItem">

                                <!--<input type="hidden" name="_METHOD" value="PUT"/>-->
                                
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" class="form-control" value="" required="required" title="" v-model="editedItem.name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="link" class="col-sm-2 control-label">Link:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="link" id="link" class="form-control" value="" required="required" title="" v-model="editedItem.link">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>
                          </div>
                      </div>
                  </div>
            </div>
            

            <hr>

            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="/items" method="POST" class="form-horizontal" role="form" v-on:submit.prevent="postItem">

                        <!--<input type="hidden" name="_METHOD" value="PUT"/>-->
                        
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" class="form-control" value="" required="required" title="" v-model="newItem.name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">Link:</label>
                            <div class="col-sm-10">
                                <input type="text" name="link" id="link" class="form-control" value="" required="required" title="" v-model="newItem.link">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            @{{ editedItem }}
        </div>

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- Vue.js -->
        <script src="https://unpkg.com/vue"></script>
        <script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>

        <script>
            Vue.http.options.root = '/items';
            Vue.http.headers.common['X-CSRF-TOKEN'] = "{!! csrf_token() !!}";

            var app = new Vue({
                el: '#rest-client',
                data: {
                    message: 'REST Demo',
                    items: [],
                    newItem: {
                        name: '',
                        link: ''
                    },
                    editedItem: null
                },
                computed: {

                },
                methods: {
                    showEditForm: function(item) {
                        if (this.editedItem === null) return false;
                        return this.editedItem.id === item.id;
                    },
                    editItem: function(item) {
                        if (this.editedItem) {
                           this.editedItem = null;
                           return;
                        }
                        this.editedItem = item;
                    },
                    getItems: function() {
                        this.$http.get('/items').then(response => {
                            this.items = response.body;
                        });
                    },
                    postItem: function() {
                        this.$http.post('/items', this.newItem).then(function() {
                            this.getItems();
                            this.newItem.name = "";
                            this.newItem.link = "";
                        });
                    },
                    deleteItem: function(item) {
                        this.$http.delete('/items/' + item.id).then(function() {
                            this.getItems();
                        });
                    },
                    putItem: function() {
                        this.$http.put('/items/' + this.editedItem.id, this.editedItem).then(function() {
                            this.editedItem = null;
                            this.getItems();
                        });
                    }
                }
            });

            app.getItems();
        </script>

    </body>
</html>
