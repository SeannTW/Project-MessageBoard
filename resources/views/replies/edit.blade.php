@extends('layouts.master')

@section('title', 'Message Board')

@section('content')
<div class="container">
  <div class="justify-content-center" style="width:500px;">
    <div class="card my-5">
      <h5 class="card-header">Message:</h5>
      <div class="card-body">
        <tr>
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="/uploads/avatars/{{ $message->avatar }}" width="60">
            <div class="media-body">
              <h2 class="mt-0" style="word-break: break-all;">{{ $message->name }}</h2>
              <p style="word-break: break-all;">{{ $message->content }}</p>
              <br/>
            </div>
          </div>
        </tr>
        <br/>
        <br/>
        <h5 class="card-footer">Edit your replies:</h5>
        <br/>

        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="/uploads/avatars/default.jpg" width="45"/>
          <div class="media-body">
            <form action="/replies/{{ $replies->id }}" method="POST">
              @method('DELETE')
              @csrf
              <div class="form-group" style="float:right;">
                <button type="submit" class="btn btn-danger btn-sm">刪除回覆</button>
              </div>
            </form>
            <h2 class="mt-0" style="word-break: break-all;">{{ $replies->name }}</h2>
            <p style="word-break: break-all;">{{ $replies->content }}</p>
            <br/>
          </div>
        </div>
        <form action="{{ route('replies.update') }}" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group">
            <input hidden type="text" name="id" class="form-control" value={{ $replies->id }}>
            <input type="textarea" name="content" class="form-control" rows="3" value={{ $replies->content }}>
            <br>
            <button type="submit" class="btn btn-info btn-sm" style="float:right;">更新回覆</button>
          </div>
        </form>
        <br>
        <form action="/replies/{{ $replies->message_id }}" method="GET">
          <div class="form-group">
            <button type="submit" class="btn btn-warning btn-sm" style="float:right;">Back</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
