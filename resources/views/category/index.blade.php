<h5>categories</h5>
@foreach($categories as $category)
    <div style="background-color:lightseagreen;margin: 50px;text-align: center;width: 150px;
height: 150px;padding: 10px;border-radius: 5px">
    <p> name : {{$category->name}}</p>
    <p>description : {{$category->description}}</p>
    </div>
    @endforeach