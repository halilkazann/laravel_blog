@extends('front.layouts.master')
<!-- Main Content-->
@section('title','İletişim')
@section('bg','public/assets/front/img/contact-bg.jpg')
@section('content')

    <div class="my-auto">
        @if(session('succes'))
            <div class="alert alert-success">{{session('succes')}}</div>
        @endif

        <form method="post" action="{{route('contact.post')}}">
            @csrf
            <div class="form">

                <input class="form-control" name="name" type="text" placeholder="Ad soyadınız"  />

            </div>
            <br />
            <div class="form">

                <input class="form-control" name="email" type="email" placeholder="Mail adresiniz"  />


            </div>
            <br />
            <div class="form">

                <select class="form-control" name="topic">
                    <option>Bilgi</option>
                    <option>Destek</option>
                    <option>Genel</option>
                </select>
            </div>
            <br />
            <div class="form-group">

                <textarea class="form-control" name="message" placeholder="Mesajınızı bu alana girebilirsiniz." ></textarea>

            </div>
            <br />

            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    To activate this form, sign up at
                    <br />
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Gönder</button>
        </form>
    </div>

    @include('front.widget.categoryWidget')
@endsection
