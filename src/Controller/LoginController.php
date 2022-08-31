<?php

declare(strict_types=1);

/*
 * This file is part of the Clivern/Weekly project.
 * (c) Clivern <hello@clivern.com>
 */

namespace App\Controller;

use App\Repository\OptionRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Login Controller.
 */
class LoginController extends AbstractController
{
    /** @var LoggerInterface */
    private $logger;

    /** @var OptionRepository */
    private $optionRepository;

    /** @var TranslatorInterface */
    private $translator;

    public function __construct(
        LoggerInterface $logger,
        OptionRepository $optionRepository,
        TranslatorInterface $translator
    ) {
        $this->logger           = $logger;
        $this->translator       = $translator;
        $this->optionRepository = $optionRepository;
    }

    /**
     * Login Web Page.
     */
    #[Route('/login', name: 'app_login_web')]
    public function login(): Response
    {
        $this->logger->info("Render login page");

        return $this->render('page/login.html.twig', [
            'title' => "Weekly",
        ]);
    }
}
