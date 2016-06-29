<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Comprimido;
use AppBundle\Form\ComprimidoType;

/**
 * Comprimido controller.
 *
 */
class ComprimidoController extends Controller
{
    /**
     * Lists all Comprimido entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comprimidos = $em->getRepository('AppBundle:Comprimido')->findAll();

        return $this->render('comprimido/index.html.twig', array(
            'comprimidos' => $comprimidos,
        ));
    }

    /**
     * Creates a new Comprimido entity.
     *
     */
    public function newAction(Request $request)
    {
        $comprimido = new Comprimido();
        $form = $this->createForm('AppBundle\Form\ComprimidoType', $comprimido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comprimido);
            $em->flush();

            return $this->redirectToRoute('comprimido_show', array('id' => $comprimido->getId()));
        }

        return $this->render('comprimido/new.html.twig', array(
            'comprimido' => $comprimido,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Comprimido entity.
     *
     */
    public function showAction(Comprimido $comprimido)
    {
        $deleteForm = $this->createDeleteForm($comprimido);

        return $this->render('comprimido/show.html.twig', array(
            'comprimido' => $comprimido,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Comprimido entity.
     *
     */
    public function editAction(Request $request, Comprimido $comprimido)
    {
        $deleteForm = $this->createDeleteForm($comprimido);
        $editForm = $this->createForm('AppBundle\Form\ComprimidoType', $comprimido);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comprimido);
            $em->flush();

            return $this->redirectToRoute('comprimido_edit', array('id' => $comprimido->getId()));
        }

        return $this->render('comprimido/edit.html.twig', array(
            'comprimido' => $comprimido,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Comprimido entity.
     *
     */
    public function deleteAction(Request $request, Comprimido $comprimido)
    {
        $form = $this->createDeleteForm($comprimido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comprimido);
            $em->flush();
        }

        return $this->redirectToRoute('comprimido_index');
    }

    /**
     * Creates a form to delete a Comprimido entity.
     *
     * @param Comprimido $comprimido The Comprimido entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comprimido $comprimido)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comprimido_delete', array('id' => $comprimido->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
