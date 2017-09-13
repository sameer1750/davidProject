@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div id="form"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script type="text/javascript" id="field1-script">
        $(document).ready(function(){
            $("#form").alpaca({
                "dataSource": "/data/customer-profile-data.json",
                "schemaSource": "/data/customer-profile-schema.json",
                "optionsSource": "/data/customer-profile-options.json",
                "view": {
                    "parent": "bootstrap-edit-horizontal",
                    "wizard": {
                        "title": "Welcome to the Wizard",
                        "description": "Please fill things in as you wish",
                        "bindings": {
                            "name": 1,
                            "age": 1,
                            "gender": 1,
                            "photo": 1,
                            "member": 2,
                            "phone": 2,
                            "icecream": 3,
                            "address": 3
                        },
                        "steps": [{
                            "title": "Getting Started",
                            "description": "Basic Information"
                        }, {
                            "title": "Details",
                            "description": "Personal Information"
                        }, {
                            "title": "Preferences",
                            "description": "Customize your Profile"
                        }]
                    }
                }
            });

        })
    </script>
@endsection