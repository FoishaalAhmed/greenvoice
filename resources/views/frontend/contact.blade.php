@extends('layouts.app')

@section('title', 'Contact')
@section('bannertext', "Contact")
@section('content')
    <main>
        <section>
            <div class="container">
                <h5 class="font-weight-bold">Mailing Address</h5>
                {!! $contact->address !!}

                <br>
                <h5 class="font-weight-bold">Phone</h5>
                <p>{{ $contact->phone }}</p>

                <br>

                <h5 class="font-weight-bold">Email</h5>
                <p><u><a href="mailto:webmaster@example.com">{{ $contact->email }}</a><br></u></p>
                <p style="font-size:18px;">Fill out the form below with any questions or inquires that you may have.
                </p><br>

                <!-- form -->

                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name *</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">

                            <label for="inputPassword4">Last Name *</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Email *</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Bivu@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Subject *</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Genarel information">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Massege</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">

                        </div>
                        <div class="form-group col-md-4">


                            </select>
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                    </div>
                    <!--  <div class="form-group">
                        <div class="form-check">
                            <div class="g-recaptcha" data-sitekey="6Ldbdg0TAAAAAI7KAf72Q6uagbWzWecTeBWmrCpJ"></div>
                        </div>
                    </div> -->
                    <button class="btn btn-lg btn-danger mr-3 " onclick="window.open('https://')" class="request-callback">Send</button>
                </form>
            </div>
        </section>
    </main>
@endsection