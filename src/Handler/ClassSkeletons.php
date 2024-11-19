<?php

declare(strict_types=1);

namespace Axleus\Tooling\Handler;

class ClassSkeletons
{
    /**
     * @var string Template for request handler class.
     */
    public const CLASS_SKELETON = <<<'EOS'
        <?php

        declare(strict_types=1);

        namespace %namespace%;

        use Core\Handler\HandlerTrait;
        use Psr\Http\Message\ResponseInterface;
        use Psr\Http\Message\ServerRequestInterface;
        use Psr\Http\Server\RequestHandlerInterface;

        class %class% implements RequestHandlerInterface
        {
            use HandlerTrait;

            public function handleGet(ServerRequestInterface $request): ResponseInterface
            {
                // Create and return a response
            }

            public function handlePost(ServerRequestInterface $request): ResponseInterface
            {
                // Create and return a response
            }

            public function handlePut(ServerRequestInterface $request): ResponseInterface
            {
                // Create and return a response
            }

            public function handleDelete(ServerRequestInterface $request): ResponseInterface
            {
                // Create and return a response
            }
        }

        EOS;

    /**
     * @var string Template for request handler class that will render a template.
     */
    public const CLASS_SKELETON_WITH_TEMPLATE = <<<'EOS'
        <?php

        declare(strict_types=1);

        namespace %namespace%;

        use Axleus\Core\Handler\HandlerTrait;
        use Psr\Http\Message\ResponseInterface;
        use Psr\Http\Message\ServerRequestInterface;
        use Psr\Http\Server\RequestHandlerInterface;
        use Laminas\Diactoros\Response\HtmlResponse;
        use Laminas\View\Model\ModelInterface;
        use Mezzio\Template\TemplateRendererInterface;

        class %class% implements RequestHandlerInterface
        {
            use HandlerTrait;

            public function __construct(
                private TemplateRendererInterface $renderer
            ) {
            }

            public function handleGet(ServerRequestInterface $request): ResponseInterface
            {
                $data = [
                    'title' => '%template-name%',
                ];

                return new HtmlResponse($this->renderer->render(
                    '%template-namespace%::%template-name%',
                    $data
                ));
            }

            public function handlePost(ServerRequestInterface $request): ResponseInterface
            {
                // Create and return a response
            }

            public function handlePut(ServerRequestInterface $request): ResponseInterface
            {
                // Create and return a response
            }

            public function handleDelete(ServerRequestInterface $request): ResponseInterface
            {
                // Create and return a response
            }
        }

        EOS;
}
