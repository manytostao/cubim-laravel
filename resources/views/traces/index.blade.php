@extends('layouts.master')

@section('title_section')
    <title>CUBiM - Administración</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection

@section('styles_section')
    {!! HTML::style('plugins/select2/select2.css') !!}
    {!! HTML::style('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') !!}
    {!! HTML::style('plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') !!}
@endsection

@section('content_section')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Trazas
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-users"></i>
                <a href="{{URL::route('traces.index')}}">Trazas</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    @if(Session::has('message'))
        <div class="alert alert-info alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
            {{Session::get('message')}}
        </div>
    @endif
    <ul style="list-style: none; padding: 0">
        @foreach($errors->all() as $error)
            <li>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                    {{ $error }}
                </div>
            </li>
        @endforeach
    </ul>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>Par&aacute;metros de filtrado
                    </div>
                    <div class="tools">
                        <a class="reload" href="javascript:;" data-original-title="" title="Limpiar filtros">
                        </a>
                        <a class="expand" href="javascript:;" data-original-title="" title="Colapsar/Expandir">
                        </a>
                    </div>
                    <div class="actions">
                        <a id="filter" class="btn default btn-sm" href="javascript:;">
                            <i class="fa fa-filter icon-black"></i> Filtrar </a>
                    </div>
                </div>
                <div class="portlet-body display-hide" style="display: none;">
                    {!! Form::open(array('route'=>'users.index', 'class'=>'form', 'id'=>'filters_form', 'name'=>'form')) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::text('first_name', Session::get('users_filters')['first_name'], array('class'=>'form-control', 'placeholder'=>'Nombres', 'id'=>'form_first_name')) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::text('last_name', Session::get('users_filters')['last_name'], array('class'=>'form-control', 'placeholder'=>'Apellidos', 'id'=>'form_last_name')) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::text('email', Session::get('users_filters')['email'], array('class'=>'form-control', 'placeholder'=>'Nombre de usuario', 'id'=>'form_email')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover"
                           id="tracesListDatatable">
                        <thead>
                        <tr>
                            <th data-name="id" style="text-align: left; display: none">
                                Id
                            </th>
                            <th data-name="operation" style="text-align: left">
                                Operaci&oacute;n
                            </th>
                            <th data-name="object" style="text-align: left">
                                Objeto
                            </th>
                            <th data-name="comments" style="text-align: left">
                                Comentario
                            </th>
                            <th data-name="module" style="text-align: left">
                                Modulo
                            </th>
                            <th data-name="created_at" style="text-align: center">
                                Fecha
                            </th>
                            <th data-name="user" style="text-align: left">
                                Usuario
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection

@section('scripts_section')
    {!! HTML::script('plugins/datatables/media/js/jquery.dataTables.min.js') !!}
    {!! HTML::script('plugins/datatables/extensions/TableTools/js/dataTables.TableTools.min.js') !!}
    {!! HTML::script('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') !!}
    {!! HTML::script('plugins/select2/select2.min.js') !!}
    {!! HTML::script('plugins/select2/select2_locale_es.js') !!}
    {!! HTML::script('scripts/traces/tracesDatatables.js') !!}
    {!! HTML::script('scripts/traces/traces.js') !!}
    {!! HTML::script('scripts/laroute.js') !!}
    {!! HTML::script('scripts/utilities.js') !!}
    <script>
        jQuery(document).ready(function () {
            traces.initFilterButtons();
            tracesDatatables.initTracesListDatatable();
        })
    </script>
@endsection