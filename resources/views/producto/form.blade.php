<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tela_id') }}
            {{ Form::select('tela_id',$tipos, $producto->tela_id, ['class' => 'form-control' . ($errors->has('tela_id') ? ' is-invalid' : ''), 'placeholder' => 'Tela Id']) }}
            {!! $errors->first('tela_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('color_id') }}
            {{ Form::select('color_id',$colores, $producto->color_id, ['class' => 'form-control' . ($errors->has('color_id') ? ' is-invalid' : ''), 'placeholder' => 'Color Id']) }}
            {!! $errors->first('color_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('metraje') }}
            {{ Form::text('metraje', $producto->metraje, ['class' => 'form-control' . ($errors->has('metraje') ? ' is-invalid' : ''), 'placeholder' => 'Metraje']) }}
            {!! $errors->first('metraje', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>