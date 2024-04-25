<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PalindromeController extends AbstractController
{
    #[Route('/', name: "palindrome_checker")]

    public function isPalindrome(Request $request): Response
    {

        $strings = $request->query->get('strings', '');

        $palindrome = [
            'Original_strings' => $strings,
            'Reversed_strings' => strrev($strings),
            'is_palindrome' => strrev($strings) === strrev($strings) ? "No" : "Yes"
        ];

        return $this->render('palindrome_checker/palindrome.html.twig', [
            'strings' => $strings,
            'palindrome' => $palindrome,
        ]);
    }
}
