<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cook;
use AppBundle\Form\Type\CookType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cook controller.
 *
 * @Route("cook")
 */
class CookController extends Controller
{
    /**
     * Lists all cook entities.
     *
     * @Route("/", name="cook_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cooks = $em->getRepository('AppBundle:Cook')->findAll();

        return $this->render('cook/index.html.twig', array(
            'cooks' => $cooks,
        ));
    }

    /**
     * Creates a new cook entity.
     *
     * @Route("/new", name="cook_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cook = new Cook();
        $form = $this->createForm(CookType::class, $cook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cook);
            $em->flush($cook);

            return $this->redirectToRoute('cook_show', array('id' => $cook->getId()));
        }

        return $this->render('cook/new.html.twig', array(
            'cook' => $cook,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cook entity.
     *
     * @Route("/{id}", name="cook_show")
     * @Method("GET")
     */
    public function showAction(Cook $cook)
    {
        $deleteForm = $this->createDeleteForm($cook);

        return $this->render('cook/show.html.twig', array(
            'cook' => $cook,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cook entity.
     *
     * @Route("/{id}/edit", name="cook_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cook $cook)
    {
        $deleteForm = $this->createDeleteForm($cook);
        $editForm = $this->createForm(CookType::class, $cook);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cook_edit', array('id' => $cook->getId()));
        }

        return $this->render('cook/edit.html.twig', array(
            'cook' => $cook,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cook entity.
     *
     * @Route("/{id}", name="cook_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cook $cook)
    {
        $form = $this->createDeleteForm($cook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cook);
            $em->flush($cook);
        }

        return $this->redirectToRoute('cook_index');
    }

    /**
     * Creates a form to delete a cook entity.
     *
     * @param Cook $cook The cook entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cook $cook)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cook_delete', array('id' => $cook->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
