<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Guante;
use AppBundle\Form\GuanteType;

/**
 * Guante controller.
 *
 */
class GuanteController extends Controller
{
    /**
     * Lists all Guante entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $guantes = $em->getRepository('AppBundle:Guante')->findAll();

        return $this->render('guante/index.html.twig', array(
            'guantes' => $guantes,
        ));
    }

    /**
     * Creates a new Guante entity.
     *
     */
    public function newAction(Request $request)
    {
        $guante = new Guante();
        $form = $this->createForm('AppBundle\Form\GuanteType', $guante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($guante);
            $em->flush();

            return $this->redirectToRoute('guante_show', array('id' => $guante->getId()));
        }

        return $this->render('guante/new.html.twig', array(
            'guante' => $guante,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Guante entity.
     *
     */
    public function showAction(Guante $guante)
    {
        $deleteForm = $this->createDeleteForm($guante);

        return $this->render('guante/show.html.twig', array(
            'guante' => $guante,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Guante entity.
     *
     */
    public function editAction(Request $request, Guante $guante)
    {
        $deleteForm = $this->createDeleteForm($guante);
        $editForm = $this->createForm('AppBundle\Form\GuanteType', $guante);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($guante);
            $em->flush();

            return $this->redirectToRoute('guante_edit', array('id' => $guante->getId()));
        }

        return $this->render('guante/edit.html.twig', array(
            'guante' => $guante,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Guante entity.
     *
     */
    public function deleteAction(Request $request, Guante $guante)
    {
        $form = $this->createDeleteForm($guante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($guante);
            $em->flush();
        }

        return $this->redirectToRoute('guante_index');
    }

    /**
     * Creates a form to delete a Guante entity.
     *
     * @param Guante $guante The Guante entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Guante $guante)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('guante_delete', array('id' => $guante->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
