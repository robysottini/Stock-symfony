<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\PrincipioActivo;
use AppBundle\Form\PrincipioActivoType;

/**
 * PrincipioActivo controller.
 *
 */
class PrincipioActivoController extends Controller
{
    /**
     * Lists all PrincipioActivo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $principioActivos = $em->getRepository('AppBundle:PrincipioActivo')->findAll();

        return $this->render('principioactivo/index.html.twig', array(
            'principioActivos' => $principioActivos,
        ));
    }

    /**
     * Creates a new PrincipioActivo entity.
     *
     */
    public function newAction(Request $request)
    {
        $principioActivo = new PrincipioActivo();
        $form = $this->createForm('AppBundle\Form\PrincipioActivoType', $principioActivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($principioActivo);
            $em->flush();

            return $this->redirectToRoute('principioactivo_show', array('id' => $principioActivo->getId()));
        }

        return $this->render('principioactivo/new.html.twig', array(
            'principioActivo' => $principioActivo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PrincipioActivo entity.
     *
     */
    public function showAction(PrincipioActivo $principioActivo)
    {
        $deleteForm = $this->createDeleteForm($principioActivo);

        return $this->render('principioactivo/show.html.twig', array(
            'principioActivo' => $principioActivo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PrincipioActivo entity.
     *
     */
    public function editAction(Request $request, PrincipioActivo $principioActivo)
    {
        $deleteForm = $this->createDeleteForm($principioActivo);
        $editForm = $this->createForm('AppBundle\Form\PrincipioActivoType', $principioActivo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($principioActivo);
            $em->flush();

            return $this->redirectToRoute('principioactivo_edit', array('id' => $principioActivo->getId()));
        }

        return $this->render('principioactivo/edit.html.twig', array(
            'principioActivo' => $principioActivo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PrincipioActivo entity.
     *
     */
    public function deleteAction(Request $request, PrincipioActivo $principioActivo)
    {
        $form = $this->createDeleteForm($principioActivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($principioActivo);
            $em->flush();
        }

        return $this->redirectToRoute('principioactivo_index');
    }

    /**
     * Creates a form to delete a PrincipioActivo entity.
     *
     * @param PrincipioActivo $principioActivo The PrincipioActivo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PrincipioActivo $principioActivo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('principioactivo_delete', array('id' => $principioActivo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
