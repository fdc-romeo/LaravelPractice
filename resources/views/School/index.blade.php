<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>School</title>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.js"></script>
</head>
<body>
	<label for="fname">Name of  School :</label><br>
	<input type="hidden" id="id" name="id" class="input">
	<input type="text" id="school_name" class="input" name="school_name" required> <br>
	<label for="fname">Adress of  School :</label><br>
	<input type="text" id="school_address"class="input"  name="school_address" required> <br><br>
	<button type="button" name="save"  id="save_school">Add School</button> <br>

    <br>
    <br>
    <table border="2" style="border-collapse:collapse;width: auto;" id="list_data">
      <thead>
        <tr>
             <th>id</th>
             <th>School Name </th>
             <th>School Address</th>
             <th>Action</th>
        </tr>
       </thead>
       <?php $count= 0;?>
		@if(!empty($data))
			@foreach($data as $key => $val) 
			 <?php $count++;?>
				 <tr>
					<th scope="row">{{ $count }}</th>
					<td>{{ $val['school_name'] }}</td>
					<td>{{ $val['school_address'] }}</td>
					<td>
						<button  class= "edit" data-id="{{ $val['id'] }}"> edit</button>
						<button  class= "delete" data-id="{{ $val['id'] }}">delete</button>
					</td>
				 </tr>
			@endforeach
		@endif
      </tbody>
    </table>
</body>
</html>
<script src="{{asset('school.js')}}"></script>