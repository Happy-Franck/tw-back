<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Le formulaire d'envoi du message</title>
</head>
<body>

	@if (session()->has('text'))
	<p>{{ session('text') }}</p>
	@endif

            <form enctype="multipart/form-data" url="{{ route('send.message.google') }}" method="post">
                <label for="message" >Message</label>
                {{ @csrf_field() }}
                <p>
                    <textarea name="message" id="message" rows="4" placeholder="Message à envoyer ici" ></textarea>
                    {{ $errors->first('message', ":message")}}
                </p>
                <input type="email"  name="email" placeholder="votre email">
                <input type="file" name="file" id="file" accept="image/*,.csv,.pdf,.txt" multiple>
                <button type="submit" >Envoyer</button>
            </form>



</body>
</html>
