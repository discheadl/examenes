<?php
declare(strict_types=1);

namespace App\Controller;

class PagesController extends AppController
{
    
    public function dashboard()
    {
    $user = $this->Authentication->getIdentity();
    $userId = $user->getIdentifier(); 
    if ($user->role === 'administrador') {
        $Users = $this->fetchTable('Users');
        $Reactivos = $this->fetchTable('Reactivos');

        $totalUsers = $Users->find()->count();
        $totalReactivos = $Reactivos->find()->count();

        $reactivosPorEspecialidad = $Reactivos->find()
            ->select([
                'area_especialidad',
                'count' => $Reactivos->find()->func()->count('*')
            ])
            ->group('area_especialidad')
            ->toArray();

        $this->set(compact('totalUsers', 'totalReactivos', 'reactivosPorEspecialidad'));
    } else {
        $Reactivos = $this->fetchTable('Reactivos');
        $misReactivos = $Reactivos->find()
            ->where(['user_id' => $userId])
            ->count();

        $this->set(compact('misReactivos'));
    }

    $this->set(compact('user'));
    }   
}