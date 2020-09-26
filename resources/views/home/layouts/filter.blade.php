

<h1 class="my-2">Filtrer</h1>
<div class="list-group">
    <a href="{{route('showProduct', ["name" => $category->name, "id" => $category->id, "filter" => "to_down"])}}" class="list-group-item">Du plus chère au moins chère</a>
    <a href="{{route('showProduct', ["name" => $category->name, "id" => $category->id, "filter" => "to_up"])}}" class="list-group-item">Du moins chère au plus chère</a>
</div>


