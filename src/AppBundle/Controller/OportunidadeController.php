<?php

namespace AppBundle\Controller;

use Domain\Model\Oportunidade;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OportunidadeController extends Controller
{
    /**
     * @Route("/oportunidade/salvar")
     * @Method("POST")
     * @param Request $request
     */
    public function salvarAction(Request $request){

        $SerializerService = $this->get('infra.serializer.service');
        $oportunidadeService = $this->get('app.oportunidade.service');

        try {
            $oportunidade = $SerializerService->converter($request->getContent(),Oportunidade::class);
            $oportunidadeService->salvar($oportunidade);
        } catch(\Exception $exception){
            return new Response($exception->getMessage(), 400);
        }

        return new Response("Operação concluída com sucesso.");
    }

    /**
     * @Route("/oportunidade/listar")
     */
    public function getOportunidadesAction()
    {
        $oportunidadeService = $this->get('app.oportunidade.service');
        $serializerService = $this->get('infra.serializer.service');

        try {
            $oportunidades = $oportunidadeService->listarTudo();
        } catch (\Exception $exception) {
            return new Response($exception->getMessage(), 400);
        }

        return new Response($serializerService->toJsonByGroups($oportunidades));
    }
}
