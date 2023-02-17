@extends('layout.loadmin')
@section('main')
    <form action="{{ route('chucvu.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tenchucvu" class="form-label">Bảo hành</label>
            <input name="tenchucvu" type="text" class="form-control" id="tenchucvu" aria-describedby="tenchucvu">
            {{ $errors->first('tenchucvu') }}
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/8.7.1/firebase-database.min.js"></script>
    <script>
        $(document).ready(function() {
            const firebaseConfig = {
                apiKey: "{{ config('services.firebase.apiKey')}}",
                authDomain: "{{ config('services.firebase.authDomain')}}",
                projectId: "{{ config('services.firebase.projectId')}}",
                storageBucket: "{{ config('services.firebase.storageBucket')}}",
                messagingSenderId: "{{ config('services.firebase.messagingSenderId')}}",
                appId: "{{ config('services.firebase.appId')}}",
                measurementId: "{{ config('services.firebase.measurementId')}}",
                databaseURL: "{{ config('services.firebase.databaseURL')}}"
            };

            const app = initializeApp(firebaseConfig);
            const analytics = getAnalytics(app);

            var id = 0;
            var database=firebase.database();


            var chucvuid = id+1;
            firebase.database().ref('chucvu/' + id).set({
              tenchucvu:tenchucvu,
            })
              
            
        });
    </script>
@endsection
