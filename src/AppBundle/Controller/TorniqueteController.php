<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Torniquete;
use AppBundle\Form\TorniqueteType;

/**
 * Torniquete controller.
 *
 */
class TorniqueteController extends Controller
{
    /**
     * Lists all Torniquete entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $torniquetes = $em->getRepository('AppBundle:Torniquete')->findAll();

        return $this->render('torniquete/index.html.twig', array(
            'torniquetes' => $torniquetes,
        ));
    }

    /**
     * Creates a new Torniquete entity.
     *
     */
    public function newAction(Request $request)
    {
        $torniquete = new Torniquete();
        $form = $this->createForm('AppBundle\Form\TorniqueteType', $torniquete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($torniquete);
            $em->flush();

            return $this->redirectToRoute('torniquete_show', array('id' => $torniquete->getId()));
        }

        return $this->render('torniquete/new.html.twig', array(
            'torniquete' => $torniquete,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Torniquete entity.
     *
     */
    public function showAction(Torniquete $torniquete)
    {
        $deleteForm = $this->createDeleteForm($torniquete);

        return $this->render('torniquete/show.html.twig', array(
            'torniquete' => $torniquete,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Torniquete entity.
     *
     */
    public function editAction(Request $request, Torniquete $torniquete)
    {
        $deleteForm = $this->createDeleteForm($torniquete);
        $editForm = $this->createForm('AppBundle\Form\TorniqueteType', $torniquete);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($torniquete);
            $em->flush();

            return $this->redirectToRoute('torniquete_edit', array('id' => $torniquete->getId()));
        }

        return $this->render('torniquete/edit.html.twig', array(
            'torniquete' => $torniquete,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Torniquete entity.
     *
     */
    public function deleteAction(Request $request, Torniquete $torniquete)
    {
        $form = $this->createDeleteForm($torniquete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($torniquete);
            $em->flush();
        }

        return $this->redirectToRoute('torniquete_index');
    }

    /**
     * Creates a form to delete a Torniquete entity.
     *
     * @param Torniquete $torniquete The Torniquete entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Torniquete $torniquete)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('torniquete_delete', array('id' => $torniquete->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
