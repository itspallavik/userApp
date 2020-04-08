<?php

namespace App\Controller;

use App\Document\User;
use App\Form\Type\UserType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ODM\MongoDB\DocumentManager as DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="users_index", methods={"GET"})
     */
    public function indexAction(DocumentManager $doc)
    {
        $allUsers = $doc->createQueryBuilder(User::class)
                ->getQuery();
        return $this->render('users/index.html.twig', [
            'all_users' => $allUsers,
        ]);
    }

    /**
     * @Route("/create", name="user_create")
     */
    public function createData(DocumentManager $doc,Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

		if ($form->isSubmitted()) {
            $userData = $form->getData();
			$doc->persist($userData);
            $doc->flush();
            return $this->redirectToRoute('users_index');
        }

        return $this->render('users/add.html.twig', [
            'update_id' => 0,
            'form' => $form->createView(), 
        ]);        
    }

    /**
     * @Route("/update/{id}", name="user_update")
     */
    public function updateData(DocumentManager $doc,Request $request, $id)
    {
        $user = $doc->find(User::class, $id);
        if(!$user){
            throw $this->createNotFoundException(
                'There are no user with the following id: ' . $id
                );            
        }
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

		if ($form->isSubmitted()) {
            $userData = $form->getData();
			$doc->persist($userData);
            $doc->flush();
            return $this->redirectToRoute('users_index');
        }

        return $this->render('users/add.html.twig', [
            'update_id' => $id,
            'form' => $form->createView(), 
        ]);

    }

    /**
     * @Route("/delete/{id}", name="user_delete", methods={"GET"})
     */
    public function deleteAction(DocumentManager $doc,$id)
    {
        $user = $doc->find(User::class, $id);
        if($user){
            $doc->remove($user);
            $doc->flush();
        }else{
            throw $this->createNotFoundException(
                'There are no user with the following id: ' . $id
                );
        }
        return $this->redirectToRoute('users_index');
    }
}