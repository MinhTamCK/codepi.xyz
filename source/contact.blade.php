@extends('_layouts.master')

@section('title', 'Contact')

@section('content')
<h1>Contact</h1>
<script src="https://carrier.formcarry.com/js/v1.js"></script>
<form id="my-contact" action="https://formcarry.com/s/{{ $page->services->formcarry }}" method="post">
    <div>
        <label for="sender">Name</label><br>
        <input type="text" name="sender" id="sender" required>
    </div>

    <div>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="message">Message</label><br>
        <textarea name="message" id="message" required></textarea>
    </div>

    <input type="text" name="_gotcha" style="display: none;">

    <input type="submit" name="submit" value="Send">
</form>
@endsection