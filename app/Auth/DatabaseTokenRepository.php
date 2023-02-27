<?php

namespace App\Auth;

use Illuminate\Auth\Passwords\DatabaseTokenRepository as DatabaseTokenRepositoryBase;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Carbon;

class DatabaseTokenRepository extends DatabaseTokenRepositoryBase
{
    //
    // Override these methods to use mobile as well as email
    //
    public function create(CanResetPasswordContract $user)
    {
        
        $mobile = $user->getMobileForPasswordReset();
        $this->deleteExisting($user);
        $token = $this->createNewToken();
        $this->getTable()->insert($this->getPayload($mobile, $token));
        return $token;
    }

    protected function deleteExisting(CanResetPasswordContract $user)
    {
        return $this->getTable()
            ->where("mobile_no", $user->getMobileForPasswordReset())
            ->delete();
    }

    protected function getPayload( $mobile, $token): array
    {
        return [
            "mobile_no" => $mobile,
            "token" => $this->hasher->make($token),
            "created_at" => new Carbon(),
        ];
    }

    public function exists(CanResetPasswordContract $user, $token)
    {
        $record = (array) $this->getTable()
            ->where("mobile_no", $user->getMobileForPasswordReset())
            ->first();
        return $record &&
               ! $this->tokenExpired($record["created_at"]) &&
                 $this->hasher->check($token, $record["token"]);
    }

    public function recentlyCreatedToken(CanResetPasswordContract $user)
    {
        $record = (array) $this->getTable()
            ->where("mobile_no", $user->getMobileForPasswordReset())
            ->first();

        return $record && $this->tokenRecentlyCreated($record['created_at']);
    }
}