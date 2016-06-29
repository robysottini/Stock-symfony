<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Aguja;
use AppBundle\Form\AgujaType;

/**
 * Aguja controller.
 *
 */
class AgujaController extends Controller
{
    /**
     * Lists all Aguja entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $agujas = $em->getRepository('AppBundle:Aguja')->findAll();

        return $this->render('aguja/index.html.twig', array(
            'agujas' => $agujas,
        ));
    }

    /**
     * Creates a new Aguja entity.
     *
     */
    public function newAction(Request $request)
    {
        $aguja = new Aguja();
        $form = $this->createForm('AppBundle\Form\AgujaType', $aguja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aguja);
            $em->flush();

            return $this->redirectToRoute('aguja_show', array('id' => $aguja->getId()));
        }

        return $this->render('aguja/new.html.twig', array(
            'aguja' => $aguja,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Aguja entity.
     *
     */
    public function showAction(Aguja $aguja)
    {
        $deleteForm = $this->createDeleteForm($aguja);

        return $this->render('aguja/show.html.twig', array(
            'aguja' => $aguja,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Aguja entity.
     *
     */
    public function editAction(Request $request, Aguja $aguja)
    {
        $deleteForm = $this->createDeleteForm($aguja);
        $editForm = $this->createForm('AppBundle\Form\AgujaType', $aguja);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aguja);
            $em->flush();

            return $this->redirectToRoute('aguja_edit', array('id' => $aguja->getId()));
        }

        return $this->render('aguja/edit.html.twig', array(
            'aguja' => $aguja,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Aguja entity.
     *
     */
    public function deleteAction(Request $request, Aguja $aguja)
    {
        $form = $this->createDeleteForm($aguja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($aguja);
            $em->flush();
        }

        return $this->redirectToRoute('aguja_index');
    }

    /**
     * Creates a form to delete a Aguja entity.
     *
     * @param Aguja $aguja The Aguja entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Aguja $aguja)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aguja_delete', array('id' => $aguja->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
