<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Jeringa;
use AppBundle\Form\JeringaType;

/**
 * Jeringa controller.
 *
 */
class JeringaController extends Controller
{
    /**
     * Lists all Jeringa entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jeringas = $em->getRepository('AppBundle:Jeringa')->findAll();

        return $this->render('jeringa/index.html.twig', array(
            'jeringas' => $jeringas,
        ));
    }

    /**
     * Creates a new Jeringa entity.
     *
     */
    public function newAction(Request $request)
    {
        $jeringa = new Jeringa();
        $form = $this->createForm('AppBundle\Form\JeringaType', $jeringa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jeringa);
            $em->flush();

            return $this->redirectToRoute('jeringa_show', array('id' => $jeringa->getId()));
        }

        return $this->render('jeringa/new.html.twig', array(
            'jeringa' => $jeringa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Jeringa entity.
     *
     */
    public function showAction(Jeringa $jeringa)
    {
        $deleteForm = $this->createDeleteForm($jeringa);

        return $this->render('jeringa/show.html.twig', array(
            'jeringa' => $jeringa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Jeringa entity.
     *
     */
    public function editAction(Request $request, Jeringa $jeringa)
    {
        $deleteForm = $this->createDeleteForm($jeringa);
        $editForm = $this->createForm('AppBundle\Form\JeringaType', $jeringa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jeringa);
            $em->flush();

            return $this->redirectToRoute('jeringa_edit', array('id' => $jeringa->getId()));
        }

        return $this->render('jeringa/edit.html.twig', array(
            'jeringa' => $jeringa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Jeringa entity.
     *
     */
    public function deleteAction(Request $request, Jeringa $jeringa)
    {
        $form = $this->createDeleteForm($jeringa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jeringa);
            $em->flush();
        }

        return $this->redirectToRoute('jeringa_index');
    }

    /**
     * Creates a form to delete a Jeringa entity.
     *
     * @param Jeringa $jeringa The Jeringa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Jeringa $jeringa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jeringa_delete', array('id' => $jeringa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
