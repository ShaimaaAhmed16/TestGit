@foreach($categories as $category)
    <p> name : {{$category->name}}</p>
    <p>description : {{$category->description}}</p>
    @endforeach