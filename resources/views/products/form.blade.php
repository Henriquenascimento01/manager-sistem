@csrf

<div class="form-group row">

    <label for="image" class="col-form-label col-sm-2 required">Banner</label>
    <div class="col-sm-10">
        <input type="file" class="form-control-file mt-4" id="image" name="image" required>
    </div>

    <label for="name" class="col-form-label col-sm-2 required">Nome</label>
    <div class="col-sm-10">
        <input type="text" name="name" required="required" class="form-control mt-4" value="{{ old('name', @$product->name) }}">
    </div>

    <label for="name" class="col-form-label col-sm-2 required">Categoria</label>
    <div class="col-sm-10">
        <select name="category" id="category" class="form-control mt-4">
            <option selected="disabled" name="category" value="">Selecione</option>
            <option name="category" value="paes">Pães</option>
            <option name="category" value="lanches">Lanches</option>
            <option name="category" value="alimentos">Alimentos</option>
        </select>
    </div>

    <label for="name" class="col-form-label col-sm-2 required">Quantidade</label>
    <div class="col-sm-10">
        <input type="number" name="max_quantity" required="required" class="form-control mt-4" value="{{ old('max_quanity', @$product->max_quantity) }}">
    </div>

    <label for="name" class="col-form-label col-sm-2 required">Preço</label>
    <div class="col-sm-10">
        <input type="number" name="unity_price" required="required" class="form-control mt-4" value="{{ old('inity_price', @$product->unity_price) }}">
    </div>

    <label for="name" class="col-form-label col-sm-2 required">Status</label>
    <div class="col-sm-10">
        <select name="status" id="status" class="form-control mt-4">
            <option selected="disabled" name="status" value="">Selecione</option>
            <option name="status" value="ativo">Ativo</option>
            <option name="status" value="inativo">Disponivel</option>
        </select>
    </div>

    <div class="col-sm-10">
        <input type="submit" class="btn btn-success mt-4" value="Cadastrar">
    </div>
</div>