<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use App\Mail\UsersQr;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function index()
    {
        $users = User::with('persona')->get();


        return view('pages-control.users', compact('users'));
    }

    public function generarQr(String $id)
    {
        $user = User::find($id);
        $user_email = $user->email;
        //encriptacion usando la funcioon oppenssl_encrypt para aes 256
        $key = env('ENCRYPTION_KEY');

        //vector de inicialización

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

        //encriptar el email
        $encriptacion = openssl_encrypt($user_email, 'aes-256-cbc', $key, 0, $iv);

        //concatenar el vector de inicializacion y el email cifrado
        $correo_encriptado = base64_encode($iv . $encriptacion);

        $pathToImage = public_path('images/uqroo.png');

        $qrCode = QrCode::size(200)->merge($pathToImage, 0.3, true)->generate($correo_encriptado);
        return view('qrcode', compact('qrCode', 'user'));
    }
    
    public function enviarMailsQr()
    {
        //Obtener los datos de todos los usuarios
        $users = User::all();

        //enviar correo a cada usuario dentro de la base de datos
        foreach ($users as $user) {
            //encrypytar el emeail del usuario, posteriormente se desencriptará en el esp32
            $correo_encriptado = Crypt::encryptString($user->email);

            //generar códigos qr
            $qrCode = QrCode::size(200)->generate($correo_encriptado);

            //mandar correos pasando los datos al metodo constructor ya creado
            Mail::to($user->email)->queue(new UsersQr($user, $qrCode));
        }
        Alert::success('Éxito', 'Correos enviados a todos los usuarios');
    
        return redirect()->back();

    }
}
