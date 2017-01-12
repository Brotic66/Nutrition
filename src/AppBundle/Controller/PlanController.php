<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Plan;
use AppBundle\Form\PlanType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Plan controller.
 *
 * @Route("/plan")
 */
class PlanController extends Controller
{
    /**
     * Lists all plan entities.
     *
     * @Route("/", name="*_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plans = $em->getRepository('AppBundle:Plan')->findAll();

        return $this->render('plan/index.html.twig', array(
            'plans' => $plans,
        ));
    }

    /**
     * Creates a new plan entity.
     *
     * @Route("/new", name="*_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $plan = new Plan();
        $form = $this->createForm(PlanType::class, $plan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plan);
            $em->flush($plan);

            return $this->redirectToRoute('*_show', array('id' => $plan->getId()));
        }

        return $this->render('plan/new.html.twig', array(
            'plan' => $plan,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plan entity.
     *
     * @Route("/{id}", name="*_show")
     * @Method("GET")
     */
    public function showAction(Plan $plan)
    {
        $deleteForm = $this->createDeleteForm($plan);

        return $this->render('plan/show.html.twig', array(
            'plan' => $plan,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plan entity.
     *
     * @Route("/{id}/edit", name="*_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Plan $plan)
    {
        $deleteForm = $this->createDeleteForm($plan);
        $editForm = $this->createForm(PlanType::class, $plan);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('*_edit', array('id' => $plan->getId()));
        }

        return $this->render('plan/edit.html.twig', array(
            'plan' => $plan,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plan entity.
     *
     * @Route("/{id}", name="*_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Plan $plan)
    {
        $form = $this->createDeleteForm($plan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plan);
            $em->flush($plan);
        }

        return $this->redirectToRoute('*_index');
    }

    /**
     * Creates a form to delete a plan entity.
     *
     * @param Plan $plan The plan entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Plan $plan)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('*_delete', array('id' => $plan->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
