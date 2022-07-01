@extends('layouts.app')
@section('content')
<?php
$userRole = Auth::user()->role;
$role1 = 1;
$role2 = 2;
$role3 = 3;
if($userRole == $role1){
    ?>

@include('principle.index')

<?php
}elseif($userRole==$role2){

echo "Teacher";

}elseif($userRole==$role3){

    echo "Student";

}
?>
@endsection
