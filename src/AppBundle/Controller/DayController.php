<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Day;
use AppBundle\Form\Type\DayType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Day controller.
 *
 * @Route("day")
 */
class DayController extends Controller
{
    /**
     * Lists all day entities.
     *
     * @Route("/", name="day_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $days = $em->getRepository('AppBundle:Day')->findAll();

        return $this->render('day/index.html.twig', array(
            'days' => $days,
        ));
    }

    /**
     * Creates a new day entity.
     *
     * @Route("/new", name="day_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $day = new Day();
        $form = $this->createForm(DayType::class, $day);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($day);
            $em->flush($day);

            return $this->redirectToRoute('day_show', array('id' => $day->getId()));
        }

        return $this->render('day/new.html.twig', array(
            'day' => $day,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a day entity.
     *
     * @Route("/{id}", name="day_show")
     * @Method("GET")
     */
    public function showAction(Day $day)
    {
        $deleteForm = $this->createDeleteForm($day);

        return $this->render('day/show.html.twig', array(
            'day' => $day,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing day entity.
     *
     * @Route("/{id}/edit", name="day_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Day $day)
    {
        $deleteForm = $this->createDeleteForm($day);
        $editForm = $this->createForm(DayType::class, $day);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('day_edit', array('id' => $day->getId()));
        }

        return $this->render('day/edit.html.twig', array(
            'day' => $day,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a day entity.
     *
     * @Route("/{id}", name="day_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Day $day)
    {
        $form = $this->createDeleteForm($day);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($day);
            $em->flush($day);
        }

        return $this->redirectToRoute('day_index');
    }

    /**
     * Creates a form to delete a day entity.
     *
     * @param Day $day The day entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Day $day)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('day_delete', array('id' => $day->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
