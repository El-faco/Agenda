<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
  
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Use Bootstrap&rsquo;s JavaScript modal plugin to add dialogs to your site for lightboxes, user notifications, or completely custom content.">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.84.0">

<meta name="docsearch:language" content="en">
<meta name="docsearch:version" content="5.0">

<title>TASK</title>

<link rel="canonical" href="https://getbootstrap.com/docs/5.0/components/modal/">



<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link href="css/docs.css" rel="stylesheet">




<script defer src="/js/script.js" data-site="ITUSEYJG"></script>
<script>
  window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
  ga('create', 'UA-146052-10', 'getbootstrap.com');
  ga('set', 'anonymizeIp', true);
  ga('send', 'pageview');
</script>
<script async src="/js/analytics.js"></script>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add of a new task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       
      <form method="POST" action="{{route('tasks.store')}}">
        <div class="modal-body">
            <div class="input-group">
              <span class="input-group-text">Task</span>
              <textarea class="form-control" name="task"></textarea>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

    </div>
  </div>
</div>


<form method="POST" action="{{route('tasks.store')}}">
  @csrf
  <div class="form-group" style="margin-left: 35%;">
      <label for="task" >Task</label>
      <textarea class="form-control" name="task" style="width: 300px; height:150px" ></textarea>
      <input type="hidden" name="user" value="{{Auth::user()->id}}">
    </div>

    <div class="form-group" style="margin-left: 40%; margin-top: 1%;">
      <button type="submit" class="btn btn-primary">Add a task</button>
    </div>

</form>

  

  <div style="margin: 50px; margin-left:100px; margin-right:100px" >
    <table class="table table-dark table-hover data-table">
    <thead>
        <tr>
        <th scope="col" style="text-align: center;">#</th>
        <th scope="col" style="background-color: navy; text-align: center;">New task</th>
        <th scope="col" style="background-color: green; text-align: center;">Finished</th>
        <th scope="col" style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($tasks as $task)
         
        
        <tr>
          @if ($task->statut ==0 && Auth::user()->id  == $task->user)
          <td  style="text-align: center; background-color:white; color:black">{{$task->id}}</td>
          <td style="background-color: navy;text-align: center;" >{{$task->task}} <br>
          <h5 style="text-align: center;">{{$task->created_at->format('Y.m.d') }}</h5></td>
          <td style="background-color: green;text-align: center;" >...</td>
          
          <td style="text-align: center;">
          <a href="/finishedTask/ {{$task->id}}" class="btn btn-success btn sm"></a>
          <a href="/deleteTask/ {{$task->id}}" class="btn btn-danger btn sm"></a>
          </td>

          @elseif ($task->statut ==1 && Auth::user()->id  == $task->user)
          <td style="text-align: center;">{{$task->id}}</td>
          <td style="background-color: navy;text-align: center;">...</td>
          <td style="background-color: green;text-align: center;" id="progress">{{$task->task}}</td>
          
          <td style="text-align: center;">
          <a href="/finishedTask/ {{$task->id}}" class="btn btn-success btn sm"></a>
          <a href="/deleteTask/ {{$task->id}}" class="btn btn-danger btn sm"></a>
          </td>
          
          @endif
        </tr>
        @endforeach


    </tbody>
    </table>

</div>
  
  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="/js/docsearch.min.js"></script>

<script src="/js/docs.min.js"></script>




<script type="text/javascript">
  var table = $(".data-table").DataTable({
    serverside: true,
    processing: true,
    ajax: "{{route('tasks.index')}}",
    columns: [
       {data:'DT_ROWIndex', name:'DT_ROWIndex'},
       {data:'New task', name:'task'},
       {data:'Finished', name:'finished'},
       {data:'Action', name:'action'},
    ]
  });
</script>

</x-app-layout>

