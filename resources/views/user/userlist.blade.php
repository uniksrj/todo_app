<x-message-b-anner msg="Login Successfully" class="error"/>
<div>
    <h1>this is user list page</h1>
</div>

<div>
    @foreach($data as $obj)
    <h5>{{$obj}}</h5>
    @endforeach
</div>

<style>
.success{
    display: flex; 
    justify-content: center; 
    align-items: center; 
    padding: 20px; 
    background-color: #e0f7fa; 
    border: 2px solid #4caf50; 
    border-radius: 10px;
    font-family: 'Arial', sans-serif;
    color: #2e7d32;
    font-size: 18px;
    box-shadow: 0px 4px 8px rgba(0,0,0,0.2);
    max-width: 400px;
    margin: 20px auto;
}
.error{
    display: flex; 
    justify-content: center; 
    align-items: center; 
    padding: 20px; 
    background-color: red; 
    border: 2px solid #4caf50; 
    border-radius: 10px;
    font-family: 'Arial', sans-serif;
    color: #2e7d32;
    font-size: 18px;
    box-shadow: 0px 4px 8px rgba(0,0,0,0.2);
    max-width: 400px;
    margin: 20px auto;
}
</style>